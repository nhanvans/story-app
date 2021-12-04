
$(window).load(function () {
    urlCommentIndex && loadListComment(urlCommentIndex)
})

$('#add-comment').on("click", "button[type='submit']", (function (e) {
    e.preventDefault()
    // let form = e.target
    // let url = $(form).attr('action')
    // let method = $(form).attr('method')
    // let formData = new FormData(form)
    // let rating = $(".leave-rating > input[name=rating]:checked").val()

    // formData.set("rating", rating)

    let username = $("#add-comment > input[name='username']").val()
    if (!username) {
        Swal.fire({
            title: rq_login,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: cancel,
            confirmButtonText: yes
        }).then((result) => {
            if (result.value) {
                window.location.href = "/login";
            };
        });
    } else
        $(e.target).trigger("submit")
    // console.log(username);

}))

$("#add-comment").validate({
    submitHandler: function (form) {
        let url = $(form).attr('action')
        let method = $(form).attr('method')
        let formData = new FormData(form)
        let rating = $(".leave-rating > input[name=rating]:checked").val()
        // if (!rating) {
        //     return Swal.fire({
        //         title: rq_rating,
        //         icon: 'error',
        //         confirmButtonColor: '#3085d6',
        //         confirmButtonText: yes
        //     })
        // }

        rating && formData.set("rating", rating)
        $.ajax({
            method: method,
            url: url,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: () => {
                Swal.fire({
                    allowOutsideClick: false,
                    title: 'Please Wait !',
                    // html: 'data uploading',
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });
            },
            success: (res) => {
                // console.table(res)
                // if (res.redirect) {
                // $.magnificPopup.close();
                //     Swal.fire({
                //         title: rq_login,
                //         icon: 'warning',
                //         showCancelButton: true,
                //         confirmButtonColor: '#3085d6',
                //         cancelButtonColor: '#d33',
                //         cancelButtonText: cancel,
                //         confirmButtonText: yes
                //     }).then((result) => {
                //         if (result.value) {
                //             window.location.href = res.redirect;
                //         };
                //     });
                // }
                if (res.success != true) {
                    if (res.data) {
                        Swal.fire({
                            icon: 'error',
                            title: save_error,
                            timer: 1500
                        }).then(() => {
                            printReviewErrors(res.data.errors);
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: save_sucess,
                        timer: 3000,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    }).then(() => {
                        urlCommentIndex && loadListComment(urlCommentIndex).then(() => {
                            SmoothScrollToForReviews("#list-comments", 500);
                            $('.star-rating').find("span").remove()
                            starRating('.star-rating');
                            $(form).trigger("reset");
                            $('.leave-rating').trigger('reset')
                        })
                        // location.reload();
                    })
                }
            },
            error: (err) => {
                console.log(err);
                if (err.responseJSON && err.responseJSON.data && err.responseJSON.data.errors) {
                    Swal.fire({
                        icon: 'error',
                        title: save_error,
                        timer: 1500
                    }).then(() => {
                        printReviewErrors(err.responseJSON.data.errors);
                        // location.reload();
                    })
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: server_error,
                        timer: 1500
                    })
                }
            }
        })

    },
    errorPlacement: function (error, element) {
        error.css({ 'color': 'red', 'margin-bottom': 12 });
        element.css('margin-bottom', 5);
        element.next().css('margin-bottom', '25px');
        element.after(error);
    },
    rules: {
        content: {
            required: true,
            maxlength: 10000
        }
    },
    messages: {
        content: {
            required: rq_content,
            maxlength: "max_content",
        }
    },

    highlight: function (element) {
        $(element).parent().addClass('has-error');
    },
    unhighlight: function (element) {
        $(element).parent().removeClass('has-error');
    }
});

(function ($) {
    $(document).ready(function () {

        $(this).on('click', '.reply-rating', function (e) {
            e.preventDefault()
            let username = $("#add-comment > input[name='username']").val()
            if (!username) {
                Swal.fire({
                    title: rq_login,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: cancel,
                    confirmButtonText: yes
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "/login";
                    }
                })
            } else {
                let url = $(this).data('url');
                let makeup = renderFormReply(url);
                let count = $(this).parents('li').find('.form-reply').length;
                let parentLi = $($(this).parents("li")[0])
                let showMoreElement = $($(parentLi).find(".show-more-replies")[0])
                if (count == 0) {
                    checkFormReply = $(this).parents(".comments").find(".checkFormReply")
                    if (checkFormReply.length) {
                        //reheight show-more-replies when remove checkForm Reply
                        checkFormReply.parent().css("height", checkFormReply.parent().height() - checkFormReply.height())
                        // delete ul empty
                        if (checkFormReply.parent().find('li').length <= 1) {
                            // console.log(checkFormReply.parent());
                            checkFormReply.parent().remove()
                        }
                        checkFormReply.remove()
                    }
                    if ($(this).parents(".comment-content").next().length) {
                        // $(makeup).appendTo($(this).parents('li'));
                        $(this).parents(".comment-content").next().prepend(makeup);
                    } else {
                        var elementUl = templateElementUlReplies();
                        $(this).parents("li").append(elementUl)
                        $(this).parents(".comment-content").next().prepend(makeup);
                    }
                    showMoreElement.css("height", $(showMoreElement.find("li:first").get(0)).height() + showMoreElement.height() + 25)
                    // showMoreElement.animate({height:showMoreElement.height()},400)

                    // var lastReplyContent = $(this).parents(".comment-content").next().children("li").last();
                    // var lastReplyContent = $(this).parents(".comment-content").next().children("li").first();
                    var lastReplyContent = $(this).parents("li");
                    SmoothScrollToForReviews(lastReplyContent, 600);
                }

            }
        })

        $(this).on('click', '.btn_reply', function () {
            let form = $(this).parents('form');
            let method = $(form).attr('method');
            let url = $(form).attr('action');

            let formData = new FormData($(form)[0]);

            // console.log(formData.get('title'),formData.get('content'),formData.getAll('files'), typeof formData.get('files'));              

            $.ajax({
                method: method,
                url: url,
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: () => {
                    Swal.fire({
                        allowOutsideClick: false,
                        title: 'Please Wait !',
                        // html: 'data uploading',
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });
                },
                success: (res) => {
                    // console.table(res)
                    // if (res.redirect) {
                    // $.magnificPopup.close();
                    //     Swal.fire({
                    //         title: rq_login,
                    //         icon: 'warning',
                    //         showCancelButton: true,
                    //         confirmButtonColor: '#3085d6',
                    //         cancelButtonColor: '#d33',
                    //         cancelButtonText: cancel,
                    //         confirmButtonText: yes
                    //     }).then((result) => {
                    //         if (result.value) {
                    //             window.location.href = res.redirect;
                    //         };
                    //     });
                    // }
                    if (res.success != true) {
                        if (res.data) {
                            Swal.fire({
                                icon: 'error',
                                title: save_error,
                                timer: 1500
                            }).then(() => {
                                printReviewErrors(res.data.errors);
                            })
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: save_sucess,
                            timer: 3000,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        }).then(() => {
                            urlCommentIndex && loadListComment(urlCommentIndex).then(() => {
                                SmoothScrollToForReviews("#list-comments", 500);
                                $('.star-rating').find("span").remove()
                                starRating('.star-rating');
                                $(form).trigger("reset");
                                $('.leave-rating').trigger('reset')
                            })
                            // location.reload();
                        })
                    }
                },
                error: (err) => {
                    console.log(err);
                    if (err.responseJSON && err.responseJSON.data && err.responseJSON.data.errors) {
                        Swal.fire({
                            icon: 'error',
                            title: save_error,
                            timer: 1500
                        }).then(() => {
                            printReviewErrors(err.responseJSON.data.errors);
                            // location.reload();
                        })
                    }else {
                        Swal.fire({
                            icon: 'error',
                            title: server_error,
                            timer: 1500
                        })
                    }
                }
            })

        });

    })
})(jQuery)

function renderFormReply(url) {
    return `
    <li style="padding:0; margin-top: 20px" class="checkFormReply">
        <!-- Review Comment -->
        <form action="${url}" method="post" class="form-reply">
        <fieldset>
            <div>
                <label>${lb_contents}:</label>
                <textarea cols="40" rows="3" id="content" name="content" onchange="changeCssReview('content')"></textarea>
                <p class="error-content" style="display: block;"></p>
            </div>

        </fieldset>
		<button type="button" class="button btn_reply">${btn_reply}</button>
        <div class="clearfix"></div>
        </form>
    </li>   
	`;
}

function templateElementUlReplies() {
    return `
	<ul class="show-more-replies" style="height: 400px;">
    
	</ul>
	`
}
