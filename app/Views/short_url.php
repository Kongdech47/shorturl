<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <!-- <img src="<?= $qrcode ?>" width="500" height="500" alt="Red dot" /> -->
    <div class="col">
        
        <dl class="row">
            <dt class="col-sm-8"><h2>Short URL</h2></dt>
            <dd class="col-sm-4 text-end"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-type="new" data-bs-target="#exampleModal">เพิ่มข้อมูล</button></dd>
        </dl>

        <div class="row">
            <table class="table bg-light" id="data_list">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Short URL</th>
                        <th scope="col">Old URL</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    </form> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="/js/short_url.js"></script>
<?= $this->endSection() ?>
