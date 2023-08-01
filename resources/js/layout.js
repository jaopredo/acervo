

$('.nav-link').on('click', function() {
    if (!this.classList.contains('active')) {
        $('.nav-link').removeClass('active')
        this.classList.add('active')
    }
})
