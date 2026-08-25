<html lang="th">
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/layout.css') ?>">
</head>
<body>
    <?php $currentMenu = $menu_active ?? 'home'; ?>
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
                        <li><a class="app-nav__link <?= $currentMenu === 'home' ? 'active' : '' ?>" href="<?= base_url('home') ?>"><i class="fa-solid fa-house"></i><span>หน้าแรก</span></a></li>
                        <li><a class="app-nav__link <?= $currentMenu === 'shorturl' ? 'active' : '' ?>" href="<?= base_url('shorturl') ?>"><i class="fa-solid fa-wand-magic-sparkles"></i><span>ย่อ URL</span></a></li>
                        <li><a class="app-nav__link <?= $currentMenu === 'logurl' ? 'active' : '' ?>" href="<?= base_url('logurl') ?>"><i class="fa-solid fa-clock-rotate-left"></i><span>ประวัติ</span></a></li>
                        <li><a class="app-nav__link <?= $currentMenu === 'statisticsurl' ? 'active' : '' ?>" href="<?= base_url('statisticsurl') ?>"><i class="fa-solid fa-chart-column"></i><span>สถิติ</span></a></li>
                    </ul>
                </div>
            </header>

            <main class="page-content">
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>
</body>
</html>

<script>
    var CSRF_TOKEN = "<?= csrf_token() ?>";

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

    var SwalShowErrorAjax = function (xhr, textStatus, errorThrown) {
        var text = '';
        if (xhr.responseJSON.errors) {
            $.each(xhr.responseJSON.errors, function (index, value) {
                text += text !== '' ? '<br/>' : text;
                text += value;
            });
        } else if (xhr.responseJSON.message) {
            text = errorThrown;
        } else {
            text = 'ERROR !';
        }

        Swal.fire({
            html: text,
            icon: 'error',
            confirmButtonText: "ตกลง"
        });
    }

    var SwalShowErrorMessage = function (text) {
        Swal.fire({
            html: text,
            icon: 'error',
            confirmButtonText: "ตกลง"
        });
    }

    var SwalShowWarningMessage = function (text) {
        Swal.fire({
            html: text,
            icon: 'warning',
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

    function openAppModal(modalId, relatedTarget) {
        var modalElement = document.getElementById(modalId);
        if (!modalElement) {
            return;
        }

        if (window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalElement).show(relatedTarget);
            return;
        }

        $(modalElement).trigger($.Event('show.bs.modal', { relatedTarget: relatedTarget }));
        $(modalElement)
            .css('display', 'block')
            .attr('aria-modal', 'true')
            .removeAttr('aria-hidden')
            .addClass('show');
        $('body').addClass('modal-open');

        if (!$('.modal-backdrop').length) {
            $('<div class="modal-backdrop fade show"></div>').appendTo(document.body);
        }
    }

    function closeAppModal(modalElement) {
        var $modal = $(modalElement);

        if (window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalElement).hide();
            return;
        }

        $modal.removeClass('show')
            .css('display', 'none')
            .removeAttr('aria-modal')
            .attr('aria-hidden', 'true');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $modal.trigger('hidden.bs.modal');
    }

    $(document).on('click', '[data-bs-dismiss="modal"]', function() {
        var modalElement = this.closest('.modal');
        if (modalElement) {
            closeAppModal(modalElement);
        }
    });
</script>
<?= $this->renderSection('script') ?>
