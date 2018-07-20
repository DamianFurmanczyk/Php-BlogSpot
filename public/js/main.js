var $modal = $('#modal'),
    $notification = $('#notification'),
    $addPostBtn = $('#add-post-btn');
$addPostForm = $('#add-post-form');

if ($notification.length) {
    setTimeout(() => {
        $notification.remove();
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