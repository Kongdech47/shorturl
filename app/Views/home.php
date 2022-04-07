
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShortURL</title>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
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
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/layout.css">
</head>
<body class="bg-light">
    <header class="p-3 mb-3 border-bottom bg-secondary bg-gradient">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-light">ShortURL</a></li>
                    <li><a href="shorturl" class="nav-link px-2 link-dark">Admin</a></li>
                </ul>

                <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form> -->

                <!-- <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 m-auto mb-3 text-center">
                <img src="https://www.freepnglogos.com/uploads/logo-website-png/logo-website-website-logo-png-transparent-background-background-15.png" class="" width="400" alt="...">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8 m-auto mb-3">
                <label class="form-label mb-0"><h4 class="mb-1"><b>ใส่ URL ที่ต้องการย่อให้สั้นลง</b></h4></label>
                <div class="input-group input-group-lg mb-1">
                    <input type="text" class="form-control" placeholder="" id="input-create_short_url" aria-describedby="btn-create_short_url">
                    <span class="input-group-text" id="btn-create_short_url" role="button"><b>ย่อ</b></span>
                </div>
                <div class="input-group input-group-sm mb-1">
                    <input type="text" class="form-control" placeholder="กรอกรูปแบบที่ต้องการ" id="input-create_short_url-expect">
                </div>
                <small class="text-danger">
                    รูปแบบ URL ที่ต้องการ เช่น IamGroot, IamStreveRogers, year2022 (หากไม่มีรูปแบบที่ต้องการให้เว้นว่าง)<br>
                    * ต้องไม่มีช่องว่าง ต้องเป็นตัวอักษาภาษาอังกฤษหรือตัวเลข และต้องมีความยาวระหว่าง 5-20<br>
                    * กรณีที่ URl เคยถูกย่อไปแล้ว จะไม่สามารถใช้รูปแบบที่ต้องการได้
                </small>
            </div>
        </div>
        <div class="row mt-4 d-none show-short-url">
            <div class="col-md-8 m-auto text-center">
                <label class="form-label mb-0"><h5 class="mb-1"><b>QR Code</b></h5></label>
                <div class="input-group input-group-sm mb-0 justify-content-center">
                    <img src="" title="QR Code" alt="QR Code" id="qrcode" width="200">
                </div>
                <small>สแกนเพื่อเปิด URL</small>
            </div>
        </div>
        <div class="row d-none show-short-url">
            <div class="col-md-8 m-auto">
                <label class="form-label mb-0"><h6 class="mb-1"><b>URL แบบย่อ</b></h6></label>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="" id="input-copy_short_url" aria-describedby="btn-copy_short_url" readonly>
                    <span class="input-group-text" onclick="copyToClipboard('input-copy_short_url')" id="btn-copy_short_url" role="button"><b>คัดลอก</b></span>
                </div>
            </div>
        </div>
        <div class="row d-none show-short-url">
            <div class="col-md-8 m-auto">
                <div class="input-group input-group-sm mb-0 justify-content-center">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-2">
                            <a href="" download="QR Code from ShortURL.png" id="download-qrcode">
                                <button type="button" class="btn btn-secondary"><i class="fa-solid fa-download"></i></button>
                            </a>
                        </div>
                        <div class="btn-group me-2" id="share-facebook">
                            <button data-sharer="facebook" data-url="" type="button" class="btn btn-primary"><i class="fa-brands fa-facebook-f"></i></button>
                        </div>
                        <div class="btn-group" id="share-twitter">
                            <button data-sharer="twitter" data-title="" data-url="" type="button" class="btn btn-info"><i class="fa-brands fa-twitter"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-8 m-auto text-center">
                <h6 class="mb-1">
                    <b>
                        เว็บไซต์สำหรับย่อลิงค์ หรือ URL ที่มีขนาดยาว ให้สั้นลงได้อย่างง่ายดาย<br>
                        สามารถแสกน QR Code เพื่อเปิดเข้าหน้าเว็บไซต์ได้<br>
                        และดาวน์โหลด QR Code แชร์ให้ผู้อื่นผ่านโซเชียลมีเดียได้
                    </b>
                </h6>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-10 m-auto"><hr></div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 m-auto">
                <label class="form-label mb-0"><h5 class="mb-1"><b>TOP 10 URL ยอดนิยม</b></h4></label>
                <div class="input-group input-group-sm mb-3">
                    <table class="table bg-light w-100" id="data_list_statistics">
                        <thead>
                            <tr>
                                <th scope="col" class="qrcode">#</th>
                                <th scope="col" class="short_url">URL แบบย่อ</th>
                                <th scope="col" class="url">URL เดิม</th>
                                <th scope="col" class="statistics">สถิติ</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 m-auto">
                <label class="form-label mb-0"><h5 class="mb-1"><b>TOP 10 อัพเดตล่าสุด</b></h4></label>
                <div class="input-group input-group-sm mb-3">
                    <table class="table bg-light w-100" id="data_list_shorturl">
                        <thead>
                            <tr>
                                <th scope="col" class="qrcode">#</th>
                                <th scope="col" class="short_url">URL แบบย่อ</th>
                                <th scope="col" class="url">URL เดิม</th>
                                <th scope="col" class="created_at">เมื่อ</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="bd-footer mt-5 bg-secondary">
        <div class="container p-5">
            <div class="row text-center">
                <div class="col mb-3">
                    <a class="d-inline-flex align-items-center mb-2 link-light text-decoration-none" href="/" aria-label="Bootstrap">
                    <img src="https://www.freepnglogos.com/uploads/logo-website-png/logo-website-website-logo-png-transparent-background-background-15.png" alt="..." width="50" class="d-block me-2">
                    <span class="fs-5">ShortURL</span>
                    </a>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2 text-light">เว็บไซต์สำหรับย่อลิงค์ หรือ URL ที่มีขนาดยาว ให้สั้นลงได้อย่างง่ายดาย</li>
                        <li class="mb-2 text-light">สามารถแสกน QR Code เพื่อเปิดเข้าหน้าเว็บไซต์ได้</li>
                        <li class="mb-2 text-light">และดาวน์โหลด QR Code แชร์ให้ผู้อื่นผ่านโซเชียลมีเดียได้</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
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
<script src="js/layout.js"></script>
<script src="js/home.js"></script>