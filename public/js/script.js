$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

$('body').on('click', '.modal-header .fa-times', function () {
    $('.modal-bg').css({
        'display': 'none'
    });
});

function load() {
    setTimeout(() => {
        $('.preloader').fadeOut();
    }, 1000);
}

// show sidebar
$('body').on('click', '.toggle-menu i.fa-bars', function () {
    $('.toggle-menu i.fa-bars').css({
        'display': 'none'
    });

    $('#navbar').addClass('bg-white');

    $('.toggle-menu i.fa-times').css({
        'display': 'block'
    });

    $('.sidebar-wrapper').addClass('active');

    $('.sidebar-wrapper').css({
        'display': 'block'
    });
});

// hide sidebar
$('body').on('click', '.toggle-menu i.fa-times', function () {
    $('.toggle-menu i.fa-times').css({
        'display': 'none'
    });

    if ($(window).scrollTop() > 10) {
        $('.toggle-menu i.fa-bars').css({
            'display': 'block',
            'color': '#000'
        });
    } else {
        $('.toggle-menu i.fa-bars').css({
            'display': 'block',
            'color': '#fff'
        });
    }

    $('.sidebar-wrapper').css({
        'display': 'none'
    });

    $('.sidebar-wrapper').removeClass('active');
});

// show modal login
$('body').on('click', '#btn-login, #already', function (e) {
    e.preventDefault();

    const url = $(this).attr('href');

    $.ajax({
        url: url,
        success: function (response) {
            $('.modal-body').html(response);

            $('.modal-bg').css({
                'display': 'block'
            });
        }
    });
});

// show modal register
$('body').on('click', '#sign-up', function (e) {
    e.preventDefault();

    const url = $(this).attr('href');

    $.ajax({
        url: url,
        success: function (response) {
            $('.modal-body').html(response);

            $('.modal-bg').css({
                'display': 'block'
            });
        }
    });
});

// preview before upload image

const preview = function (event) {
    const reader = new FileReader();

    reader.onload = function () {
        const img = document.querySelector('#img-user');
        img.src = reader.result;
    }

    reader.readAsDataURL(event.target.files[0]);
}

// catch auth
$('body').on('submit', '#form-login', function (e) {
    e.preventDefault();

    const url = $(this).attr('action'),
        username = $('#username').val(),
        password = $('#password').val();

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function (res) {
            if (res.msg === "success") {

                $('.modal-bg').hide();

                Toast.fire({
                    type: 'success',
                    title: 'Signed in successfully'
                });

                window.location.reload();

            } else {

                const err = function () {
                    $('.form-wrapper').attr('style', 'border:1px solid var(--red)');

                    $('.group-form label').attr('style', 'color:var(--red)');

                    const err = {
                        class: 'invalid-msg'
                    };

                    const message = $('<p>', err);
                    message.html('Data tidak cocok dengan akun manapun');
                    $('.forgot-pass').prepend(message);
                }

                $('p').hasClass('invalid-msg') ? '' : err();
            }
        }
    });

});

$('body').on('submit', '#form-register', function (e) {
    e.preventDefault();

    const url = $(this).attr('action'),
        form = $('#form-register');

    $.ajax({
        url: url,
        type: 'POST',
        data: form.serialize(),
        success: function (res) {
            if (res.msg === 'success') {
                $('.modal-bg').hide();

                swal({
                    type: 'success',
                    title: 'Sukses',
                    text: 'Silahkan login untuk melanjutkan'
                });
            }
        }
    });
});

$('body').on('submit', '.form-order', function (e) {
    e.preventDefault();

    const url = $(this).attr('action'),
        link = $('#order').data('link'),
        form = $('.form-order').serialize();

    $.ajax({
        url: url,
        type: 'POST',
        data: form,
        success: function (res) {
            $('.modal-bg').hide();
            Toast.fire({
                type: 'success',
                title: 'Berhasil Order, Harap tunggu driver..'
            });
        }
    });
});

// user profile menu
$('body').on('click', '.left li a', function (e) {
    e.preventDefault();

    const url = $(this).attr('href');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (res) {
            $('section#profile .right').html(res);
        }
    });
});


// register driver

$('body').on('click', '#register-driver', function (e) {
    e.preventDefault();

    const url = $(this).attr('href');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (res) {
            $('.modal-body').html(res);

            $('.modal-bg').show();
        }
    });

});

$('body').on('submit', 'form#changerole', function (e) {
    e.preventDefault();

    const url = $(this).attr('action'),
        form = $('form#changerole');

    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData(form[0]),
        processData: false,
        contentType: false,
        success: function (res) {
            if (res.msg = 'created') {
                $('.modal-bg').hide();

                setTimeout(() => {
                    Swal({
                        type: 'success',
                        title: 'Selamat !',
                        text: 'Kamu sudah menjadi seorang driver sekarang',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }, 500);
            }
        }
    });

});

$('body').on('submit', '.form-contact', function (e) {
    e.preventDefault();

    const url = $(this).attr('action'),
        form = $('.form-contact');

    $.ajax({
        url: url,
        type: 'POST',
        data: form.serialize(),
        success: function (res) {
            if (res.msg === 'success') {

                form[0].reset();

                swal({
                    type: 'success',
                    title: 'Terkirim !',
                    text: 'Terimakasih sudah memberikan masukan kepada kami',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    });
})

$('body').on('submit', '#form-take', function (e) {
    e.preventDefault();

    const url = $(this).attr('action'),
        link = $('#form-take button').data('link'),
        reloadOrder = function () {
            $.ajax({
                url: link,
                dataType: 'html',
                success: function (res) {
                    $('section#profile .right').html(res);
                }
            });
        }

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            '_method': 'PUT'
        },
        success: function (res) {
            if (res.msg === 'taken') {
                swal({
                    type: 'success',
                    title: 'Berhasil diambil',
                    text: 'Segera jemput penumpangnya !',
                    showConfirmButton: false,
                    timer: 3000
                });
                reloadOrder();
            }
        }
    });
})

$('body').on('click', '#notif', function () {
    const data = $(this).data('link');

    $.ajax({
        url: data,
        type: 'POST',
        data: {
            '_method': 'PUT'
        },
        success: function (res) {
            if (res.msg === updated) {

            }
        }
    });
});
