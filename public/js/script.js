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
