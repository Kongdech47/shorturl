$(document).ready(function() {
    var dataTB= {
        search: "",
        page: 0
    }

    var getListData = function(){
        $("#datatable_overlay").addClass('d-flex');
        $("#datatable_overlay").show();

        $.ajax({
            type: "POST",
            url: "shorturl/ListAll",
            data: {csrf_token: CSRF_TOKEN},
            dataType:'json',
            success: function(result) {
                listData = result.data || [];
                table.clear().draw();
                table.rows.add(listData).draw();
            },
            error: function(result) {
                SwalShowErrorMessage(result);
            },
            complete: function(result) {
                setTimeout(function(){
                    $("#datatable_overlay").fadeOut("slow");
                    $("#datatable_overlay").removeClass('d-flex');
                }, 1000);
            }
        });

    }

    var table = $('#data_list').DataTable({
        data: listData,
        search: {
            search: dataTB.search
        },
        initComplete: function () {                    
            this.api().page(dataTB.page).draw('page');
        },
        rowCallback: function(row, data, start, end, display) {
            $(row).off('click.btnDel').on('click.btnDel', '.btnDel', function(e) {
                var id = $(this).data('id');
                if(id){

                    SwalConfirm({
                        title: 'ยืนยันการลบข้อมูล',
                        html: "คุณต้องการยืนยันการลบข้อมูลใช่หรือไม่ ?",
                        type: 'delete',
                        action: function() {
                            $.ajax({
                                type: "POST",
                                url: "shorturl/del",
                                data: {
                                    csrf_token: CSRF_TOKEN,
                                    id: id
                                },
                                dataType:'json',
                                success: function(result) {
                                    if(SwalShowSuccessAjax(result)){
                                        modal.modal('hide');
                                        dataTB.search = $('.dataTables_filter input').val();
                                        dataTB.page = $('table').DataTable().page.info();
                                        getListData();
                                    }
                                },
                                error: function(result) {
                                    SwalShowErrorMessage(result);
                                },
                                complete: function(result) {}
                            });
                        }
                    });
                }
            });
        },
        columns: [
            {
                data: null,
                className: 'text-center',
                width: '100px'
            },
            {
                data: null,
                className: 'text-center',
                width: '100px'
            },
            {
                data: 'name',
                width: '280px'
            },
            {
                data: 'short_url',
                // width: '200px'
            },
            {
                data: 'url',
                visible: false
            },
        ],
        columnDefs: [
            {
                targets: 'manage',
                render: function(data, type, row, meta){
                    var button = '';
                    button += '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-key="'+meta.row+'" data-type="edit" data-bs-target="#myModal" data-bs-toggle="tooltip" title="แก้ไข"><i class="fa-solid fa-pen"></i></button>';
                    button += ' <button type="button" class="btn btn-danger btn-sm btnDel" data-id="'+row.id+'" data-bs-toggle="tooltip" title="ลบ"><i class="fa-solid fa-trash-can"></i></button>';
                    return button;
                }
            },
            {
                targets: 'qrcode',
                render: function(data, type, row, meta){
                    var button = '';
                    button += '<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-key="'+meta.row+'" data-bs-target="#qrModal" data-bs-toggle="tooltip" title="เปิด QR Code"><i class="fa-solid fa-qrcode"></i></button>';
                    return button;
                }
            },
            {
                targets: 'name',
                render: function(data, type, row, meta){
                    return truncateString(data, 25);
                }
            },
            {
                targets: 'short_url',
                render: function(data, type, row, meta){
                    return '<a href="'+(data || "#")+'" target="_blank">'+truncateString(data, 55)+'</a>';
                }
            },
            {
                targets: 'url',
                render: function(data, type, row, meta){
                    return truncateString(data, 100);
                }
            }
        ]
    });

    var modal = $("#myModal");
    var form = modal.find('form');
    modal.on('show.bs.modal', function(e) {
        var type = $(e.relatedTarget).data('type');
        var table_info = $('table').DataTable().page.info();
        var table_search = $('.dataTables_filter input').val();

        modal.find('#myModalLabel p').html('');
        form.find('input, textarea').val('');

        if(type == 'edit'){
            modal.find('#myModalLabel p').html('แก้ไข');

            var row_data = listData[$(e.relatedTarget).data('key')];
            form.find('[name=id]').val(row_data.id || "");
            form.find('[name=name]').val(row_data.name || "");
            form.find('[name=url]').val(row_data.url || "");
            form.find('[name=short_url]').val(row_data.short_url || "");
        }else if(type == 'new'){
            modal.find('#myModalLabel p').html('เพิ่ม');
        }

        modal.find('.btn-save').off('click.saveData').on('click.saveData', function(){
            var saveData = {
                csrf_token: CSRF_TOKEN,
                id: form.find('#id').val(),
                name: form.find('#name').val(),
                url: form.find('#url').val(),
                short_url: form.find('#short_url').val()
            };
            if(!saveData.url){
                SwalShowWarningMessage('กรุณากรอก URL เดิม');
                return false;
            }
            if(form.find('#id').val()){
                saveData.id = form.find('#id').val();
            }

            SwalConfirm({
                title: 'ยืนยันการบันทึกข้อมูล',
                html: "คุณต้องการยืนยันการบันทึกข้อมูลใช่หรือไม่ ?",
                action: function() {
                    $.ajax({
                        type: "POST",
                        url: "shorturl/save",
                        data: saveData,
                        dataType:'json',
                        success: function(result) {
                            if(SwalShowSuccessAjax(result)){
                                modal.modal('hide');
                                getListData();
                            }
                        },
                        error: function(result) {
                            SwalShowErrorMessage(result);
                        },
                        complete: function(result) {}
                    });
                }
            });
        });
    }).on('shown.bs.modal', function() {}).on('hodden.bs.modal', function() {});

    var modalQR = $("#qrModal");
    modalQR.on('show.bs.modal', function(e) {
        var row_data = listData[$(e.relatedTarget).data('key')];

        modalQR.find('#qrModalLabel p').html(row_data.name ? '"'+truncateString(row_data.name, 30)+'"' : "");
        modalQR.find('img').attr('src', row_data.qrcode);
        modalQR.find('img').attr('alt', row_data.name);
    }).on('shown.bs.modal', function() {}).on('hodden.bs.modal', function() {});
} );