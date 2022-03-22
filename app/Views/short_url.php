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

    <script src="<?= base_url('js/short_url.js') ?>"></script>

<?= $this->endSection() ?>
