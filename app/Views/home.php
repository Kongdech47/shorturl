<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShortURL</title>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.5/dist/sweetalert2.all.min.js" integrity="sha256-sGjBCiHulRy0hJZNvqUc9GypoF3M1qpR9Pc3fiQHIBw=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/all.min.js" integrity="sha512-Cvxz1E4gCrYKQfz6Ne+VoDiiLrbFBvc6BPh4iyKo2/ICdIodfgc5Q9cBjRivfQNUXBCEnQWcEInSXsvlNHY/ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.js" integrity="sha512-ztxZscxb55lKL+xmWGZEbBHekIzy+1qYKHGZTWZYH1GUwxy0hiA18lW6ORIMj4DHRgvmP/qGcvqwEyFFV7OYVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/layout.css') ?>">
</head>
<body>
    <div class="app-shell">
        <div class="container">
            <header class="app-navbar">
                <div class="app-navbar__inner">
                    <a href="<?= base_url('home') ?>" class="app-brand">
                        <span class="app-brand__mark"><i class="fa-solid fa-link"></i></span>
                        <span>
                            <span class="app-brand__title">shorturl-app</span>
                            <span class="app-brand__subtitle">URL shortener with QR and analytics</span>
                        </span>
                    </a>

                    <ul class="app-nav">
                        <li><a class="app-nav__link active" href="<?= base_url('home') ?>"><i class="fa-solid fa-house"></i><span>หน้าแรก</span></a></li>
                        <li><a class="app-nav__link" href="<?= base_url('shorturl') ?>"><i class="fa-solid fa-wand-magic-sparkles"></i><span>ย่อ URL</span></a></li>
                        <li><a class="app-nav__link" href="<?= base_url('logurl') ?>"><i class="fa-solid fa-clock-rotate-left"></i><span>ประวัติ</span></a></li>
                        <li><a class="app-nav__link" href="<?= base_url('statisticsurl') ?>"><i class="fa-solid fa-chart-column"></i><span>สถิติ</span></a></li>
                    </ul>
                </div>
            </header>

            <main class="page-content">
                <section class="hero-card mb-4">
                    <div class="hero-grid">
                        <div class="hero-copy">
                            <span class="hero-badge"><i class="fa-solid fa-bolt"></i>ย่อลิงก์ได้ทันที ใช้งานง่ายบนทุกอุปกรณ์</span>
                            <h1 class="hero-title">สร้างลิงก์สั้นที่ <span>ดูดี แชร์ง่าย</span> และติดตามผลได้</h1>
                            <p class="hero-description">
                                เปลี่ยน URL ยาวให้กระชับขึ้นภายในไม่กี่วินาที พร้อม QR Code สำหรับสแกน, ลิงก์พร้อมแชร์ และข้อมูลการเข้าชมที่ดูได้ทันทีทั้งบนมือถือและเดสก์ท็อป
                            </p>

                            <div class="hero-points">
                                <div class="info-chip">
                                    <strong>Custom slug</strong>
                                    <span>ตั้งชื่อ URL ให้จำง่ายตามแคมเปญหรือทีมงาน</span>
                                </div>
                                <div class="info-chip">
                                    <strong>QR พร้อมใช้</strong>
                                    <span>ดาวน์โหลดและแชร์ต่อได้ทันทีจากหน้าเดียว</span>
                                </div>
                                <div class="info-chip">
                                    <strong>ดูสถิติได้</strong>
                                    <span>ติดตามลิงก์ยอดนิยมและรายการล่าสุดแบบเรียลไทม์</span>
                                </div>
                            </div>
                        </div>

                        <aside class="panel-card hero-form">
                            <div>
                                <h2 class="panel-title">เริ่มย่อ URL</h2>
                                <p class="panel-meta">วางลิงก์ที่ต้องการ จากนั้นระบบจะสร้างลิงก์สั้นและ QR Code ให้ทันที</p>
                            </div>

                            <div class="input-stack">
                                <label class="form-label-muted" for="input-create_short_url">URL ที่ต้องการย่อ</label>
                                <div class="input-group input-group-lg app-input">
                                    <input type="text" class="form-control" id="input-create_short_url" aria-describedby="btn-create_short_url" placeholder="https://example.com/your-very-long-link">
                                    <span class="input-group-text" id="btn-create_short_url" role="button">ย่อ URL</span>
                                </div>
                            </div>

                            <div class="input-stack">
                                <label class="form-label-muted" for="input-create_short_url-expect">รูปแบบ URL ที่ต้องการ</label>
                                <div class="input-group input-group-sm app-input">
                                    <input type="text" class="form-control" id="input-create_short_url-expect" placeholder="เช่น campaign2026 หรือ teamalpha">
                                </div>
                            </div>

                            <p class="form-hint">
                                ใส่ได้เฉพาะตัวอักษรภาษาอังกฤษและตัวเลข ความยาว 5-20 ตัวอักษร และต้องไม่มีช่องว่าง
                                <strong>หากปล่อยว่าง ระบบจะสร้างให้โดยอัตโนมัติ</strong>
                            </p>
                        </aside>
                    </div>
                </section>

                <section class="result-card show-short-url d-none mb-4">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-4">
                            <div class="qr-preview">
                                <img src="" title="QR Code" alt="QR Code" id="qrcode" width="200">
                            </div>
                            <p class="text-center text-muted-soft mt-3 mb-0">สแกนเพื่อเปิด URL ได้ทันที</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="section-header">
                                <div>
                                    <h2 class="section-title">สร้างลิงก์สั้นสำเร็จ</h2>
                                    <p class="section-description">คัดลอกลิงก์หรือแชร์ผ่านช่องทางที่ต้องการได้จากชุดเครื่องมือด้านล่าง</p>
                                </div>
                            </div>
                            <div class="input-group input-group-sm app-input mb-3">
                                <input type="text" class="form-control" id="input-copy_short_url" readonly>
                                <span class="input-group-text" onclick="copyToClipboard('input-copy_short_url')" id="btn-copy_short_url" role="button">คัดลอก</span>
                            </div>
                            <div class="result-actions">
                                <a href="" download="QR Code from ShortURL.png" id="download-qrcode" class="btn btn-secondary"><i class="fa-solid fa-download"></i></a>
                                <div id="share-facebook">
                                    <button data-sharer="facebook" data-url="" type="button" class="btn btn-primary"><i class="fa-brands fa-facebook-f"></i></button>
                                </div>
                                <div id="share-twitter">
                                    <button data-sharer="twitter" data-title="" data-url="" type="button" class="btn btn-info"><i class="fa-brands fa-twitter"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-4">
                    <div class="feature-grid">
                        <article class="feature-card">
                            <span class="feature-card__icon"><i class="fa-solid fa-link"></i></span>
                            <h3>ลิงก์สั้นที่อ่านง่าย</h3>
                            <p>ลดความยาวของ URL เพื่อใช้งานกับโพสต์, งานแคมเปญ, เอกสาร หรือ QR ได้สะดวกขึ้น</p>
                        </article>
                        <article class="feature-card">
                            <span class="feature-card__icon"><i class="fa-solid fa-qrcode"></i></span>
                            <h3>QR Code พร้อมใช้งาน</h3>
                            <p>ระบบสร้าง QR Code ให้อัตโนมัติ รองรับการดาวน์โหลดและแชร์ต่อได้โดยไม่ต้องใช้เครื่องมือเสริม</p>
                        </article>
                        <article class="feature-card">
                            <span class="feature-card__icon"><i class="fa-solid fa-chart-line"></i></span>
                            <h3>สรุปผลการคลิก</h3>
                            <p>ดูรายการยอดนิยมและอัปเดตล่าสุดจากหน้าเดียว ช่วยให้ตรวจสอบการใช้งานได้เร็วขึ้น</p>
                        </article>
                    </div>
                </section>

                <section class="dashboard-grid">
                    <article class="table-card">
                        <div class="section-header">
                            <div>
                                <h2 class="section-title">TOP 10 URL ยอดนิยม</h2>
                                <p class="section-description">ดูว่าลิงก์ใดถูกเปิดใช้งานมากที่สุดในระบบตอนนี้</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table w-100" id="data_list_statistics">
                                <thead>
                                    <tr>
                                        <th scope="col" class="qrcode">#</th>
                                        <th scope="col" class="short_url">URL แบบย่อ</th>
                                        <th scope="col" class="url">URL เดิม</th>
                                        <th scope="col" class="statistics">สถิติ</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </article>

                    <article class="table-card">
                        <div class="section-header">
                            <div>
                                <h2 class="section-title">TOP 10 อัปเดตล่าสุด</h2>
                                <p class="section-description">รายการลิงก์ที่ถูกสร้างล่าสุดเพื่อเช็กความเคลื่อนไหวของระบบ</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table w-100" id="data_list_shorturl">
                                <thead>
                                    <tr>
                                        <th scope="col" class="qrcode">#</th>
                                        <th scope="col" class="short_url">URL แบบย่อ</th>
                                        <th scope="col" class="url">URL เดิม</th>
                                        <th scope="col" class="created_at">เมื่อ</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </article>
                </section>
            </main>
        </div>
    </div>

    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bolder" id="qrModalLabel">QR Code<p class="m-0 ps-2 float-end"></p></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col text-center">
                            <img src="" width="200" alt="" />
                            <p>สแกนเพื่อเปิด URL</p>
                        </div>
                    </div>
                    <div class="row">
                        <span id="qr_name"><b class="float-start me-2">ชื่อ:</b><p class="text-break"></p></span>
                    </div>
                    <div class="row">
                        <span id="qr_shorturl"><b class="float-start me-2">URL แบบย่อ:</b><p class="text-break"><a href="" target="_blank"></a></p></span>
                    </div>
                    <div class="row">
                        <span id="qr_url"><b class="float-start me-2">URL เดิม:</b><p class="text-break"></p></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    var CSRF_TOKEN = "<?= csrf_token() ?>";

    var listStatistics = '<?= json_encode($listStatistics) ?>';
    listStatistics = JSON.parse(listStatistics);

    var listDataShorturl = '<?= json_encode($listDataShorturl) ?>';
    listDataShorturl = JSON.parse(listDataShorturl);
</script>

<script>
    var truncateString = function (str, length) {
        return $.trim(str) ? (str.length > length ? str.substring(0, length - 3) + '...' : str) : "";
    }

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    var SwalLoading = function (e) {
        e = e || {};
        Swal.fire({
            title: e.title || 'กำลังทำรายการ',
            html: 'กรุณารอสักครู่...',
            allowOutsideClick: false,
            showConfirmButton: false,
            showCancelButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    }

    var SwalConfirm = function (e) {
        var icon = 'info';
        if (e.type == 'delete') {
            icon = 'warning';
        }

        Swal.fire({
            title: e.title,
            html: e.html,
            icon: icon,
            allowOutsideClick: false,
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: "ยืนยัน",
            cancelButtonText: "ยกเลิก"
        }).then((result) => {
            if (result.value) {
                SwalLoading();
                e.action();
            }
        });
    }

    var SwalShowSuccessAjax = function (data) {
        if (data.success) {
            Swal.fire({
                html: data.success || '',
                icon: 'success',
                confirmButtonText: "ตกลง"
            });
            return true;
        } else {
            Swal.fire({
                html: data.error || data || 'ERROR !',
                icon: 'error',
                confirmButtonText: "ตกลง"
            });
            return false;
        }
    }

    var SwalShowErrorMessage = function (text) {
        Swal.fire({
            html: text,
            icon: 'error',
            confirmButtonText: "ตกลง"
        });
    }

    $.extend(true, $.fn.dataTable.defaults, {
        deferRender: true,
        scrollCollapse: true,
        scroller: true,
        scrollX: true,
        responsive: true,
        pageLength: 25,
        language: {
            zeroRecords: "ไม่พบข้อมูล",
            emptyTable: "ไม่พบข้อมูล",
            info: "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
            infoEmpty: "ไม่มีข้อมูล",
            infoFiltered: "(กรอกจากทั้งหมด _MAX_ รายการ)",
            lengthMenu: "แสดง _MENU_ รายการต่อหน้า",
            search: "ค้นหา",
            paginate: {
                first: "แรกสุด",
                last: "ท้ายสุด",
                next: "ถัดไป",
                previous: "ย้อนกลับ"
            }
        }
    });

    function copyToClipboard(id) {
        var copy_text_val = document.getElementById(id);
        copy_text_val.select();
        document.execCommand("copy");
    }
</script>

<script>
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
                        button += '<button type="button" class="btn btn-success btn-sm" onclick="showHomeQrModal(\'statisticsurl\', '+meta.row+')" title="เปิด QR Code"><i class="fa-solid fa-qrcode"></i></button>';
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
                    width: '128px'
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
                        button += '<button type="button" class="btn btn-success btn-sm" onclick="showHomeQrModal(\'shorturl\', '+meta.row+')" title="เปิด QR Code"><i class="fa-solid fa-qrcode"></i></button>';
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
                },
                {
                    targets: 'created_at',
                    render: function(data, type, row, meta){
                        if (!data) {
                            return '-';
                        }

                        var dateValue = new Date(data.replace(' ', 'T'));
                        if (isNaN(dateValue.getTime())) {
                            return '<span class="compact-datetime"><span>-</span></span>';
                        }

                        var today = new Date();
                        today.setHours(0, 0, 0, 0);
                        dateValue.setHours(0, 0, 0, 0);

                        var diffTime = today.getTime() - dateValue.getTime();
                        var diffDays = Math.max(0, Math.floor(diffTime / 86400000));
                        var label = diffDays === 0 ? 'วันนี้' : diffDays + ' วันที่แล้ว';

                        return '<span class="compact-datetime"><span>' + label + '</span></span>';
                    }
                }
            ]
        });

        var modalQR = $("#qrModal");
        var modalQRInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('qrModal'));
        window.showHomeQrModal = function(type, key) {
            var triggerButton = document.createElement('button');
            triggerButton.dataset.type = type;
            triggerButton.dataset.key = key;
            modalQRInstance.show(triggerButton);
        };
        modalQR.on('show.bs.modal', function(e) {
            var row_data;
            if($(e.relatedTarget).data('type') == 'statisticsurl'){
                row_data = listStatistics[$(e.relatedTarget).data('key')];
            }else{
                row_data = listDataShorturl[$(e.relatedTarget).data('key')];
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
                            var response = result.data;
                            $("#qrcode").attr('src', response.qrcode);
                            $("#input-copy_short_url").val(response.short_url);

                            $("#download-qrcode").attr('href', response.qrcode);
                            $("#share-facebook button").attr('data-url', response.short_url);
                            $("#share-twitter button").attr('data-title', "ย่อลิงก์ฟรี");
                            $("#share-twitter button").attr('data-url', response.short_url);

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
    });
</script>
