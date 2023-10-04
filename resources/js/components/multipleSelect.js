
// $('.multiple-select').ready(function() {
//     // console.log($('.multiple-select').attr('data-id'))

//     for (let item of $('.multiple-select-item')) {
//         let id = item.getAttribute('data-id')

//         $(`#select-option-${id}`).remove()
//     }
// })

/* SCROLANDO AS OPÇÕES SE FOREM MUITAS */
// $('.multiple-select').on('wheel', function(e) {
//     if (e.originalEvent.deltaY > 0) {
//         this.scrollLeft += 100;
//         e.preventDefault();
//     } else {
//         this.scrollLeft -= 100;
//         e.preventDefault();
//     }
// })

/* MOSTRANDO OU ESCONDENDO AS OPÇÕES */
$('.show-options').on('click', function(event) {
    const id = this.getAttribute('data-id')

    $(`#options-list-${id}`).toggle();
})

/* QUANDO CLICA NUMA TAG */
$('body').on('click', '.multiple-select-item', function() {
    const itemID = this.getAttribute('data-id')
    const associated = this.getAttribute('data-associated')
    const label = this.getAttribute('data-label')

    $(`#multiple-item-${itemID}-${associated}`).remove()

    $(`#no-text-${associated}`).hide()

    $(`#select-option-list-${associated}`).append(`
        <li
            id="select-option-${itemID}-${associated}"
            class="input-option option-${associated} p-2"

            data-label="${label}"
            data-associated="${associated}"
            data-value="${itemID}"
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

    $(`#select-option-${id}-${form}`).remove()


    if ($(`.option-${form}`).length == 0) {
        $(`#no-text-${form}`).toggle()
    }

    $(`#multiple-select-${form}`).append(`
        <li data-label="${label}" data-id="${id}" data-associated="${form}" id="multiple-item-${id}-${form}" class="multiple-select-item">
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
