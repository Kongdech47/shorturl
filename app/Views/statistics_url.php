<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <section class="admin-page">
        <article class="panel-card">
            <span class="page-kicker"><i class="fa-solid fa-chart-column"></i>ภาพรวมการใช้งาน</span>
            <h1 class="page-title"><?= $title ?></h1>
            <p class="page-summary">ติดตามจำนวนการเปิดของแต่ละลิงก์แบบย่อเพื่อดูว่าลิงก์ไหนได้รับความสนใจมากที่สุด และเปิด QR Code เพื่อใช้งานต่อได้ทันที</p>
        </article>

        <article class="table-card">
            <div class="section-header">
                <div>
                    <h2 class="section-title">สถิติการเปิดลิงก์</h2>
                    <p class="section-description">ตารางเรียงตามจำนวนครั้งที่ถูกเปิด และปรับให้ดูง่ายขึ้นบนทั้งหน้าจอเล็กและหน้าจอใหญ่</p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table w-100" id="data_list">
                    <thead>
                        <tr>
                            <th scope="col" class="qrcode">QR Code</th>
                            <th scope="col" class="name">ชื่อ</th>
                            <th scope="col" class="short_url">URL แบบย่อ</th>
                            <th scope="col" class="statistics">สถิติการเปิด</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </article>
    </section>

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
                        <span id="qr_url"><b class="float-start me-2">URL เดิม:</b><p class="text-break"><a href="" target="_blank"></a></p></span>
                    </div>
                    <div class="row">
                        <span id="qr_statistics"><b class="float-start me-2">สถิติการเปิด URL แบบย่อ:</b><p class="text-break me-2"></p></span>
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

    <!-- <script src="<?= base_url('js/statistics_url.js') ?>"></script> -->
    <script>
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
                        button += '<button type="button" class="btn btn-success btn-sm" onclick="showStatisticsQrModal('+meta.row+')" title="เปิด QR Code"><i class="fa-solid fa-qrcode"></i></button>';
                        return button;
                    }
                },
                {
                    targets: 'short_url',
                    render: function(data, type, row, meta){
                        return '<a href="'+(data || "#")+'" target="_blank">'+data+'</a>';
                    }
                },
            ]
        });


        var modalQR = $("#qrModal");
        var modalQRInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('qrModal'));
        window.showStatisticsQrModal = function(key) {
            var triggerButton = document.createElement('button');
            triggerButton.dataset.key = key;
            modalQRInstance.show(triggerButton);
        };
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
            modalQR.find('#qr_statistics p').html((row_data.statistics || "0") + " ครั้ง");
        }).on('shown.bs.modal', function() {}).on('hodden.bs.modal', function() {});
    } );
    </script>

<?= $this->endSection() ?>
