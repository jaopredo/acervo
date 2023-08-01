

$('.nav-link').on('click', function() {
    if (!this.classList.contains('active')) {
        $('.nav-link').removeClass('active')
        this.classList.add('active')
    }
})

$('.floating-toggler').on('click', function() {
    let containerId = this.id.split('-icon').join('')
    let container = $(`#${containerId}`)
    if (Number(container.css('opacity'))) {
        container.css({ opacity: 0, transform: 'scale(0)' })
    } else {
        container.css({ opacity: 1, transform: 'scale(1)' })
    }
})
