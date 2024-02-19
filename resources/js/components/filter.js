
$('.filter-activation').on('click', function() {
    const activated = !!Number($('#filter-container').attr('data-activated'))

    if (!activated) {
        $('#filter-container').show()
        $('#filter-container').animate({
            right: 0
        })

        $('.filter-cover').toggle()
        $('.filter-cover').animate({
            opacity: .5
        })
        $('#content').addClass('overflow-y-hidden')
    } else {
        $('#filter-container').animate({
            right: '-700px'
        })
        $('.filter-cover').animate({
            opacity: 0
        })
        setTimeout(function () {
            $('.filter-cover').toggle()
            $('#content').removeClass('overflow-y-hidden')
            $('#filter-container').hide()
        }, 400)
    }

    $('#filter-container').attr('data-activated', Number(!activated))

    if ($('#filter-container').css('display') == 'none') {
        $('#content-container').css('overflow', 'auto')
    } else {
        $('#content-container').css('overflow', 'hidden')
    }
})

$('.filter-input').on('change', function(e) {
    if (e.target.value == "") {
        $(`#${e.target.id}`).attr('name', '')
    } else {
        $(`#${e.target.id}`).attr('name', e.target.dataset.name)
    }
})
