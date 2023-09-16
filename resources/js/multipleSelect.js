
$('#multiple-select').ready(function() {
    console.log('teste')

    for (let item of $('.multiple-select-item')) {
        let id = item.getAttribute('data-id')

        $(`#select-option-${id}`).remove()
    }
})

/* SCROLANDO AS OPÇÕES SE FOREM MUITAS */
$('.multiple-select').on('wheel', function(e) {
    if (e.originalEvent.deltaY > 0) {
        this.scrollLeft += 100;
        e.preventDefault();
    } else {
        this.scrollLeft -= 100;
        e.preventDefault();
    }
})

/* MOSTRANDO OU ESCONDENDO AS OPÇÕES */
$('.show-options').on('click', function(event) {
    $('.options-list').toggle();
})

/* QUANDO CLICA NUMA TAG */
$('body').on('click', '.multiple-select-item', function() {
    const id = this.getAttribute('data-id')
    const label = this.getAttribute('data-label')

    $(`#multiple-item-${id}`).remove()

    $('#select-option-list').append(`
        <li
            id="select-option-${id}"
            class="input-option p-2"

            data-label="${label}"
            data-associated="${id}"
            data-value="${id}"
        >
            ${label}
        </li>
    `)
})

/* QUANDO CLICA NUM ESPECÍFICO */
$('body').on('click', '.input-option', function() {
    const form = this.getAttribute('data-associated')
    const id = this.getAttribute('data-value')
    const label = this.getAttribute('data-label')

    $(`#select-option-${id}`).remove()

    $(`#multiple-select`).append(`
        <li data-label="${label}" data-id="${id}" id="multiple-item-${id}" class="multiple-select-item">
            <div class="close-item-icon" data-id="${id}">
                <svg width="18" class="close-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <p>${label}</p>
            <input type="hidden" name="${form}[]" value="${id}">
        </li>
    `)
})
