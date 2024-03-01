
const imports_ids = [
    'books',
    'students'
]

$('#import-select').on('change', function(event) {
    const id = event.target.value

    imports_ids.forEach(iid => {
        id == iid?$(`#${id}-order`).show():$(`#${iid}-order`).hide()
    })
})
