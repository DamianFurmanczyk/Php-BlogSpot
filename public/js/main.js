var $modal = $('#modal');

function showModal(title, info) {
    $modal
        .find('.modal-title')
        .text(title);
    $modal
        .find('.modal-body')
        .text(info);
    $modal.modal();
}

$('#login-form')
    .on('submit', function (e) {
        e.preventDefault('');
        var $t = $(this),
            btn = $t.find('[type="submit"]'),
            username = $t
                .find('[name="username"]')
                .val(),
            password = $t
                .find('[name="password"]')
                .val();

        if ($t.hasClass('active')) {
            if (!username || !password) {}
        }

        btn
            .text('Anuluj')
            .addClass('cancel');
        $t.toggleClass('active');
    });