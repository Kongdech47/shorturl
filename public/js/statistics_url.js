$(document).ready(function() {
    var table = $('#data_list').DataTable({
        data: listData,
        order: [ 3, 'desc' ],
        columns: [
            {
                data: null,
                className: 'text-center',
                width: '120px'
            },
            {
                data: 'name',
                width: '230px'
            },
            {
                data: 'short_url',
                width: '200px'
            },
            {
                data: 'statistics',
                className: 'text-center',
                width: '250px'
            },
        ],
        columnDefs: [
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
        ]
    });


    var modalQR = $("#qrModal");
    modalQR.on('show.bs.modal', function(e) {
        var row_data = listData[$(e.relatedTarget).data('key')];

        modalQR.find('#qrModalLabel p').html(row_data.name ? '"'+truncateString(row_data.name, 30)+'"' : "");
        modalQR.find('img').attr('src', row_data.qrcode);
        modalQR.find('img').attr('alt', row_data.name);

        modalQR.find('#qr_name p').html(row_data.name || "-");
        modalQR.find('#qr_shorturl p a').attr('href', row_data.short_url || "#");
        modalQR.find('#qr_shorturl p a').html(row_data.short_url || "");
        modalQR.find('#qr_url p a').attr('href', row_data.url || "#");
        modalQR.find('#qr_url p a').html(row_data.url || "");
        modalQR.find('#qr_name p').html(row_data.statistics || "0");
    }).on('shown.bs.modal', function() {}).on('hodden.bs.modal', function() {});
} );