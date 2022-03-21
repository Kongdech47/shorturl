var truncateString = function (str, length) {
    return $.trim(str) ? (str.length > length ? str.substring(0, length - 3) + '...' : str) : "";
}




var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});





// $('.modal').modal({
//     backdrop: 'static',
//     keyboard: false,
//     show: false,
// });




// $.ajaxSetup({
//     beforeSend: function(jqXHR, settings){
//         console.log(jqXHR, settings);
//     },
// });




// START Sweet Alert 2

var SwalLoading = function (e) {
    e = e || {};
    Swal.fire({
        title: e.title || 'กำลังทำรายการ',
        html: 'กรุณารอสักครู่...',
        allowOutsideClick: false,
        showConfirmButton: false,
        showCancelButton: false,
        didOpen: () => {
            Swal.showLoading()
        }
    });
}

var SwalConfirm = function (e) {
    // type = add, edit, delete
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

var SwalShowSuccessAjax = function (data, textStatus, jqXHR) {
    // console.log(data, textStatus, jqXHR);
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
    // console.log(xhr, textStatus, errorThrown);
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

// END Sweet Alert 2





// START DATATABLE
//set default datatable
$.extend(true, $.fn.dataTable.defaults, {
    deferRender: true,
    scrollCollapse: true,
    scroller: true,
    scrollX: true,
    // serverSide: true,
    // processing: false,
    // paging: true,
    // order: [],
    // lengthChange: false,
    // searching: false,
    // ordering: true,
    // info: true,
    // autoWidth: false,
    responsive: true,
    pageLength: 25,
    // dom: '<"datatable-top">rt<"datatable-bottom"><"clear">',
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

// END DATATABLE





function copyToClipboard(id) {
    var copy_text_val = document.getElementById(id);
    copy_text_val.select();
    document.execCommand("copy");
    // console.log(copy_text_val.value);
}