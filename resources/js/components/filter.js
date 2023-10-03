
$('.filter-activation').on('click', function() {
    const activated = !!Number($('#filter-container').attr('data-activated'))

    if (!activated) {
        $('#filter-container').animate({
            right: 0
        })

        $('.filter-cover').toggle()
        $('.filter-cover').animate({
            opacity: .5
        })
    } else {
        $('#filter-container').animate({
            right: '-700px'
        })
        $('.filter-cover').animate({
            opacity: 0
        })
        setTimeout(function () {
            $('.filter-cover').toggle()
        }, 400)
    }

    $('#filter-container').attr('data-activated', Number(!activated))

    if ($('#filter-container').css('display') == 'none') {
        $('#content-container').css('overflow', 'auto')
    } else {
        $('#content-container').css('overflow', 'hidden')
    }
})
