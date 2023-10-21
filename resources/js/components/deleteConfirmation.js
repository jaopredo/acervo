
$('.delete-button').on('click', function() {
    $('.delete-confirmation').show()
    $('.filter-cover').show()

    $('#content').css('overflow-y', 'hidden')

    /* DELETANDO */
    const route = this.getAttribute('data-route')
    
    $('#delete-button').attr('action', route)
})

$('.delete-cancel').on('click', function() {
    $('.delete-confirmation').hide()
    $('.filter-cover').hide()

    $('#content').css('overflow-y', 'auto')
})
