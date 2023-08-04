
// infinteLoadMore();
if ($('#data-wrapper').hasClass('search')) {
    $('.auto-load').hide()
} else {
    infinteLoadMore()
}

$('#content-container').on('scroll', function () {
    if (($('#content-container').scrollTop() > this.scrollHeight - 600) && !($('#data-wrapper').hasClass('search')) ){
        infinteLoadMore();
    }
});
function infinteLoadMore() {
    $.ajax({
        url: "/books",
        datatype: "html",
        type: "get",
        beforeSend: function () {
            $('.auto-load').show();
        }
    })
    .done(function (response) {
        if (response.length == 0) {
            $('.auto-load').html("Não há mais o que mostrar!");
            return;
        }
        $('.auto-load').hide();
        $("#data-wrapper").append(response);
    })
    .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log('Erro no servidor');
    });
}
