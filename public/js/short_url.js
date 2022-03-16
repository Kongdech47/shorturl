$(document).ready(function() {
    var data = [
        {
            id: 1,
            short_url: 'www.xxx.com/asd',
            old_url: 'www.google.com'
        },
        {
            id: 2,
            short_url: 'www.xxx.com/asd',
            old_url: 'www.google.com'
        },
        {
            id: 3,
            short_url: 'www.xxx.com/asd',
            old_url: 'www.google.com'
        },
        {
            id: 4,
            short_url: 'www.xxx.com/asd',
            old_url: 'www.google.com'
        },
        {
            id: 5,
            short_url: 'www.xxx.com/asd',
            old_url: 'www.google.com'
        },
    ];

    $('#data_list').DataTable({
        data: data,
        deferRender: true,
        scrollCollapse: true,
        scroller: true,
        columns: [
            {
                data: 'id'
            },
            {
                data: 'short_url'
            },
            {
                data: 'old_url'
            },
        ],
        columnDefs: [
            {
                targets: 0,
                render: function(data, type, row, meta){
                    return data > 2 ? '99' : data;
                }
            }
        ]
    });
} );