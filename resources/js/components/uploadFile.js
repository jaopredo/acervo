
$('.upload-input').on('change', function() {
    const related = this.getAttribute('data-related')

    $('.file-item').remove()

    if (this.files.length > 0) {
        for (let file of this.files) {
            $(`#upload-files-list-${related}`).append(`
                <li class="file-item">${file.name}</li>
            `)
        }
    } else {
        $(`#upload-files-list-${related}`).append(`
            <li class="file-item">Nenhum arquivo selecionado</li>
        `)
    }
})
