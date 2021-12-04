$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.simple-fw-slick-carousel-custom1').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: true,
    arrows: false,

    responsive: [
    {
      breakpoint: 1610,
      settings: {
        slidesToShow: 4,
      }
    },
    {
      breakpoint: 1365,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
      }
    }
    ]
});

// JS COMMENT

$('#pagination-comment-story').on('click', 'ul a', function (event) {
    event.preventDefault()
    let href = $(this).attr('href')
    if (href !== '#') {
        $.ajax({
            url: href,
            type: 'get',
        })
        .done(function (data) {
            $('#list-comments').html(data.listComments);
            $('#pagination-comment-story').html(data.paginationComment);
        })
        .fail(function () {
            Swal.fire({
                icon: 'error',
                title: server_error,
                timer: 1500
            })
            })
        .then(() => {
            SmoothScrollToForReviews("#list-comments", 500);
        })
    }
})

function loadListComment(url) {
    return $.get(url)
        .done(function (data) {
            if (Object.keys(data).length > 0) {
                $('#list-comments').html(data.listComments);
                $('#pagination-comment-story').html(data.paginationComment);
                $('.total-comment-number').html(data.totalCommentStory);
            } else {
                $('#list-comments').html('');
                $('#pagination-comment-story').html('');
                $('.total-comment-number').html('0');
            }
        })
        .fail(function () {
            Swal.fire({
                icon: 'error',
                title: server_error,
                timer: 1500
            })
        })
}

function changeCssReview(id, div) {
    var value = $("#" + id).val();
    if (value == '') {
        $("#" + id).parent().addClass("has-error");
        document.getElementById(id).focus();
    } else {
        $("#" + id).parent().removeClass("has-error");
        $("#" + id).next().css("display", "none");
        $("#" + id).css('margin-bottom', 30);

        setTimeout(function () {
            $("#" + id).next().css("display", "none");
            $("#" + id).css('margin-bottom', 30);
        }, 6000);
    }
}

function printReviewErrors(errors) {
    for (let [key, value] of Object.entries(errors)) {
        $(".error-" + key).css('display', 'block').html(value[0]);
        $(".error-" + key).prev('input,textarea').css('margin-bottom', 0);
        $(".error-" + key).css("color", "#f10000");
        $(".error-" + key).css("font-size", "15px");
    }
}

$('#list-comments').on('click', '.show-more-replies-button', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    let showMoreReplies = $(this).prev();
    showMoreReplies.toggleClass('visible');
    if (showMoreReplies.is(".visible")) {

        var el = showMoreReplies,
            curHeight = el.height(),
            autoHeight = el.css('height', 'auto').height();
        el.height(curHeight).animate({ height: autoHeight }, 400);


    } else { showMoreReplies.animate({ height: '200px' }, 400); }
});

function SmoothScrollToForReviews(id_or_Name, timelength) {
    var timelength = timelength || 1000;
    $('html, body').animate({
        scrollTop: $(id_or_Name).offset().top - 90
    }, timelength, function () {
        // window.location.hash = id_or_Name;
    });
}
// END JS COMMENT
