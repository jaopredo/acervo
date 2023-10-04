

// $('.nav-link').on('click', function() {
//     if (!this.classList.contains('active')) {
//         $('.nav-link').removeClass('active')
//         this.classList.add('active')
//     }
// })

$('.floating-toggler').on('click', function() {
    let containerId = this.id.split('-icon').join('')
    let container = $(`#${containerId}`)
    if (Number(container.css('opacity'))) {
        container.css({ opacity: 0, transform: 'scale(0.0001)' })
    } else {
        container.css({ opacity: 1, transform: 'scale(1)' })
    }
})

$('.msg').ready(function() {
    $('.msg').animate({
        right: '-2.5rem',
    })

    setTimeout(function() {
        $('.msg').animate({
            left: '100vw'
        })
    }, 5000)
})

$('form').ready(function() {
    $('label + *').addClass('form-control')
})
