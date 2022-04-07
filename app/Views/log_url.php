<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="col">
        <dl class="row">
            <dt class="col-sm-8"><h2><?= $title ?></h2></dt>
        </dl>

        <div class="row">
            <table class="table bg-light w-100" id="data_list">
                <thead>
                    <tr>
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
    </script>

    <script src="js/log_url.js"></script>

<?= $this->endSection() ?>
