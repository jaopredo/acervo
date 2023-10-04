/**
 * Checa se o elemento está dentro da tela
 * @param {HTMLElement} el
 * @returns {Boolean}
 */
function isElementInViewport (el) {
    // Special bonus for those using jQuery
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }

    var rect = el.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /* or $(window).height() */
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) /* or $(window).width() */
    );
}

/* MOSTRANDO OU ESCONDENDO AS OPÇÕES */
$('.show-options').on('click', function(event) {
    event.stopPropagation()

    const id = this.getAttribute('data-id')
    const element = $(`#options-list-${id}`)

    element.toggle()

    if (($(`#options-list-${id}`).css('display') == 'block')) {
        $(`#multiple-${id}-select`).addClass('false-focus');
    } else {
        $(`#multiple-${id}-select`).removeClass('false-focus');
    }

    if (isElementInViewport(element[0])) {
        element.css('top', '120%')
    } else {
        element.css('transform', 'translateY(-100%)')
    }
})

/* ATIVANDO O TRIGGER QUANDO CLICA NA LISTA */
$('body').on('click', '.multiple-select', function(event) {
    event.stopPropagation()
    const id = this.getAttribute('data-id')

    $(`#${id}-button`).trigger('click')
})

/* QUANDO CLICA NUMA TAG */
$('body').on('click', '.multiple-select-item', function(event) {
    event.stopPropagation()

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
$('body').on('click', '.input-option', function(event) {
    event.stopPropagation()

    const form = this.getAttribute('data-associated')
    const id = this.getAttribute('data-value')
    const label = this.getAttribute('data-label')

    $(`#select-option-${id}-${form}`).remove()


    if ($(`.option-${form}`).length == 0) {
        $(`#no-text-${form}`).toggle()
    }

    $(`#multiple-select-${form}`).append(`
        <li data-label="${label}" data-id="${id}" data-associated="${form}" id="multiple-item-${id}-${form}" class="multiple-select-item multiple-select-item hover:cursor-pointer">
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
