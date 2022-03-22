<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="col">
        <div id="datatable_overlay" class="progress-bar progress-bar-striped progress-bar-streit active"><p class="m-auto">กำลังโหลดข้อมูล...</p></div>
        <dl class="row">
            <dt class="col-sm-8"><h2><?= $title ?></h2></dt>
            <dd class="col-sm-4 text-end"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-type="new" data-bs-target="#myModal"><i class="fa-solid fa-plus pe-2"></i>เพิ่มข้อมูล</button></dd>
        </dl>

        <div class="row">
            <table class="table bg-light w-100" id="data_list">
                <thead>
                    <tr>
                        <th scope="col" class="manage">จัดการ</th>
                        <th scope="col" class="qrcode">QR Code</th>
                        <th scope="col" class="name">ชื่อ</th>
                        <th scope="col" class="short_url">URL แบบย่อ</th>
                        <th scope="col" class="url">URL เดิม</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>


    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bolder" id="myModalLabel"><p class="m-0 pe-2 float-start"></p>URL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="short_url" name="short_url">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">ชื่อ:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="url" class="col-form-label"><p class="m-0 pe-2 float-start text-danger">*</p>URL เดิม:</label>
                            <textarea class="form-control" cols="30" rows="5" name="url" id="url" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary btn-save">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bolder" id="qrModalLabel">QR Code<p class="m-0 ps-2 float-end"></p></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col text-center">
                        <img src="" width="200" alt="" />
                        <p>สแกนเพื่อเปิด URL</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

    <script>
        var listData = '<?= json_encode($listData) ?>';
        listData = JSON.parse(listData);
        // console.log(listData);
    </script>

    <!-- <script src="<?= base_url('js/short_url.js') ?>"></script> -->
    <script>
        $(document).ready(function() {
        var dataTB= {
            search: "",
            page: 0
        }

        var getListData = function(){
            // $("#datatable_overlay").addClass('d-flex');
            // $("#datatable_overlay").show();

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
                        // $("#datatable_overlay").fadeOut("slow");
                        // $("#datatable_overlay").removeClass('d-flex');
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
                    targets: 'short_url',
                    render: function(data, type, row, meta){
                        return '<a href="'+(data || "#")+'" target="_blank">'+data+'</a>';
                    }
                }
            ]
        });

        var modal = $("#myModal");
        var form = modal.find('form');
        modal.on('show.bs.modal', function(e) {
            var type = $(e.relatedTarget).data('type');
            // var table_info = $('table').DataTable().page.info();
            // var table_search = $('.dataTables_filter input').val();

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
    </script>

<?= $this->endSection() ?>
