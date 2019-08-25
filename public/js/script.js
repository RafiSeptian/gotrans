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
