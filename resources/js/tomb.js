$('#show-tomb-form-button').on('click', function(event) {
    $('#tomb-form').show()
    $('#show-tomb-form-button').hide()
    $('#hide-tomb-form-button').show()
})

$('#hide-tomb-form-button').on('click', function(event) {
    $('#tomb-form').hide()
    $('#show-tomb-form-button').show()
    $('#hide-tomb-form-button').hide()
})


$('.edit-tomb-button').on('click', function(event) {
    const id = this.getAttribute('aria-valuenow')

    $(`#edit-tomb-button-${id}`).hide()
    $(`#edit-tomb-${id}`).show()
    $(`#tomb-${id}`).hide()
    $(`#edit-tomb-hide-${id}`).show()
})

$('.edit-hide-tomb').on('click', function(event) {
    const id = this.getAttribute('aria-valuenow')

    $(`#edit-tomb-button-${id}`).show()
    $(`#edit-tomb-${id}`).hide()
    $(`#tomb-${id}`).show()
    $(`#edit-tomb-hide-${id}`).hide()
})
