
$('#search-form').on('submit', function( event ) {
    event.preventDefault()

    const value = $('#search-input').val()

    const { origin, pathname } = window.location

    window.location = origin + pathname + `?filters[name][like]=${value}`
})
