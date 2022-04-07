
<!DOCTYPE html>
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/layout.css">
</head>
<body class="bg-light">
    <header class="p-3 mb-3 border-bottom bg-secondary bg-gradient">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="home" class="nav-link px-2 link-light">ShortURL</a></li>
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

    <div class="container mt-3">
        <div class="row mb-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="home">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($menu_active ?? "") == 'shorturl' ? 'active' : '' ?>" <?= ($menu_active ?? "") == 'shorturl' ? 'aria-current="page"' : '' ?> href="shorturl">ย่อ URL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($menu_active ?? "") == 'logurl' ? 'active' : '' ?>" <?= ($menu_active ?? "") == 'logurl' ? 'aria-current="page"' : '' ?> href="logurl">ประวัติการย่อ URL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($menu_active ?? "") == 'statisticsurl' ? 'active' : '' ?>" <?= ($menu_active ?? "") == 'statisticsurl' ? 'aria-current="page"' : '' ?> href="statisticsurl">สถิติ URL</a>
                </li>
            </ul>
        </div>
        <div class="row gx-5">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    
    <!-- <footer class="bd-footer mt-5 bg-secondary">
        <div class="container p-5">
            <div class="row text-center">
                <div class="col mb-3">
                    <a class="d-inline-flex align-items-center mb-2 link-light text-decoration-none" href="/" aria-label="Bootstrap">
                    <img src="/img/logo.png" alt="..." width="50" class="d-block me-2">
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
    </footer> -->

</body>
</html>

<script src="js/layout.js"></script>
<?= $this->renderSection('script') ?>