var $modal = $('#modal'),
    $notification = $('#notification'),
    $addPostBtn = $('#add-post-btn'),
    $addPostForm = $('#add-post-form'),
    $rmPostIcon = $('.fa-minus-circle');

if ($notification.length) {
    setTimeout(() => {
        $notification.fadeOut(350);
    }, 5000);
}

function showModal(title, info) {
    $modal
        .find('.modal-title')
        .text(title);
    $modal
        .find('.modal-body')
        .text(info);
    $modal.modal();
}

$addPostBtn.length && $addPostBtn.click(() => {
    $addPostForm.toggleClass('active');
});

$rmPostIcon.click(function () {
    var postId = $(this).data('postId');

    $.post('/_projects/cms/includes/rm_post.php', {postId: postId});

    location.reload();
});