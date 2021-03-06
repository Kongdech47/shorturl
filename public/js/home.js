$(document).ready(function() {
    var getListData = function(){
        $.ajax({
            type: "POST",
            url: "home/ListAllStatisticsUrl",
            data: {csrf_token: CSRF_TOKEN},
            dataType:'json',
            success: function(result) {
                listStatistics = result.data || [];
                tablestatistics.clear().draw();
                tablestatistics.rows.add(listStatistics).draw();
            }
        });
        $.ajax({
            type: "POST",
            url: "home/ListAllShortUrl",
            data: {csrf_token: CSRF_TOKEN},
            dataType:'json',
            success: function(result) {
                listDataShorturl = result.data || [];
                tableshorturl.clear().draw();
                tableshorturl.rows.add(listDataShorturl).draw();
            }
        });
    }

    var tablestatistics = $('#data_list_statistics').DataTable({
        data: listStatistics,
        dom: 'Brt',
        columns: [
            {
                data: null,
                className: 'text-center',
                width: '120px'
            },
            {
                data: 'short_url',
                width: '250px'
            },
            {
                data: 'url',
                width: '300px'
            },
            {
                data: 'statistics',
                className: 'text-center',
                width: '200px'
            },
        ],
        columnDefs: [
            {
                targets: '_all',
                orderable: false,
            },
            {
                targets: 'qrcode',
                render: function(data, type, row, meta){
                    var button = '';
                    button += '<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-key="'+meta.row+'" data-type="statisticsurl" data-bs-target="#qrModal" data-bs-toggle="tooltip" title="เปิด QR Code"><i class="fa-solid fa-qrcode"></i></button>';
                    return button;
                }
            },
            {
                targets: 'short_url',
                render: function(data, type, row, meta){
                    var html = '<a href="'+(data || "#")+'" target="_blank">'+data+'</a>';
                    if(row.name){
                        html += '<br><small class="text-secondary">'+row.name+'</small>';
                    }
                    return html;
                }
            }
        ]
    });

    var tableshorturl = $('#data_list_shorturl').DataTable({
        data: listDataShorturl,
        dom: 'Brt',
        columns: [
            {
                data: null,
                className: 'text-center',
                width: '120px'
            },
            {
                data: 'short_url',
                width: '250px'
            },
            {
                data: 'url',
                width: '300px'
            },
            {
                data: 'created_at',
                className: 'text-center',
                width: '200px'
            },
        ],
        columnDefs: [
            {
                targets: '_all',
                orderable: false,
            },
            {
                targets: 'qrcode',
                render: function(data, type, row, meta){
                    var button = '';
                    button += '<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-key="'+meta.row+'" data-type="shorturl" data-bs-target="#qrModal" data-bs-toggle="tooltip" title="เปิด QR Code"><i class="fa-solid fa-qrcode"></i></button>';
                    return button;
                }
            },
            {
                targets: 'short_url',
                render: function(data, type, row, meta){
                    var html = '<a href="'+(data || "#")+'" target="_blank">'+data+'</a>';
                    if(row.name){
                        html += '<br><small class="text-secondary">'+row.name+'</small>';
                    }
                    return html;
                }
            }
        ]
    });


    var modalQR = $("#qrModal");
    modalQR.on('show.bs.modal', function(e) {
        if($(e.relatedTarget).data('type') == 'statisticsurl'){
            var row_data = listStatistics[$(e.relatedTarget).data('key')];
        }else{
            var row_data = listDataShorturl[$(e.relatedTarget).data('key')];
        }

        modalQR.find('#qrModalLabel p').html(row_data.name ? '"'+truncateString(row_data.name, 30)+'"' : "");
        modalQR.find('img').attr('src', row_data.qrcode);
        modalQR.find('img').attr('alt', row_data.name);

        modalQR.find('#qr_name p').html(row_data.name || "-");
        modalQR.find('#qr_shorturl p a').attr('href', row_data.short_url || "#");
        modalQR.find('#qr_shorturl p a').html(row_data.short_url || "");
        modalQR.find('#qr_url p').html(row_data.url || "-");
    }).on('shown.bs.modal', function() {}).on('hodden.bs.modal', function() {});

    

    $("#btn-create_short_url").off("click.create_short_url").on("click.create_short_url", function() { 
        var url = $('#input-create_short_url').val();
        if(url){
            SwalLoading({title: ' '});

            var saveData = {
                csrf_token: CSRF_TOKEN,
                url: url,
                expect: $('#input-create_short_url-expect').val() || ""
            };

            $.ajax({
                type: "POST",
                url: "home/addurl",
                data: saveData,
                dataType:'json',
                success: function(result) {
                    if(SwalShowSuccessAjax(result)){
                        var result = result.data;
                        $("#qrcode").attr('src', result.qrcode);
                        $("#input-copy_short_url").val(result.short_url);

                        $("#download-qrcode").attr('href', result.qrcode);
                        $("#share-facebook button").attr('data-url', result.short_url);
                        $("#share-twitter button").attr('data-title', "ย่อลิงค์ฟรี");
                        $("#share-twitter button").attr('data-url', result.short_url);

                        $('.show-short-url').removeClass('d-none');

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
} );