
$('.filter-activation').on('click', function() {
    $('#filter-container').toggle()
    $('.filter-cover').toggle()

    if ($('#filter-container').css('display') == 'none') {
        $('#content-container').css('overflow', 'auto')
    } else {
        $('#content-container').css('overflow', 'hidden')
    }
})
