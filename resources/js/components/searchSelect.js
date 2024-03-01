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

/**
 * Open the dropbox when click
 */
function dropboxAction(context, action) {
    const id = context
    const element = $(`#options-list-container-${id}`)

    element.css('top', '0%')
    element.css('transform', 'none')

    if (action == 'close') {
        $(`#search-${id}-select`).removeClass('false-focus');
        element.css('display', 'none')
    } else {
        $(`#search-${id}-select`).addClass('false-focus');
        element.css('display', 'block')
    }

    if (isElementInViewport(element[0])) {
        element.css('top', '120%')
    } else {
        element.css('transform', 'translateY(-100%)')
    }
}


/* QUANDO DIGITAR NO INPUT DE PROCURAR */
let timeout = setTimeout(() => {
}, 0);

$('body').on('keypress', '.search-input', async function(event) {
    clearTimeout(timeout)

    const related = this.getAttribute('data-related')
    const endpointUrl = this.getAttribute('data-endpoint')
    const attr = this.getAttribute('data-attr')

    $(`#clear-${related}`).toggle()

    timeout = setTimeout(function() {
        const { value } = event.target
        const endpoint = `${endpointUrl}?filters[${attr}][like]=${value}`

        if (value != "") {
            $(`#search-options-list-${related}`).text('')
            $(`#loading-${related}`).show()
            $(`#search-options-list-${related}`).show();
            $(`#no-text-${related}`).hide()
            $(`#not-found-${related}`).hide()

            try {
                $.ajax(endpoint, {
                    type: "GET",
                    success: function (response) {
                        $(`#loading-${related}`).hide()
                        $(`#not-found-${related}`).hide()

                        const { data } = response

                        if (data.length > 0) {
                            for (let item of data) {
                                $(`#search-options-list-${related}`).append(`
                                    <li
                                        id="input-option-${related}-${item.id}"
                                        data-related="${related}"
                                        data-id="${item.id}"
                                        class="input-option p-2"
                                    >${item.name}</li>
                                `)
                            }
                        } else {
                            $(`#not-found-${related}`).show()
                        }
                    },
                    error: function (err) {
                        $(`#not-found-${related}`).show()
                        $(`#loading-${related}`).hide()
                    }
                })
            } catch (err) {
                $(`#not-found-${related}`).show()
            }
        }
    }, 500)
})


/* ATIVANDO O TRIGGER QUANDO CLICA NA LISTA */
$('.search-input').on('focus', function(event) {
    const id = this.getAttribute('data-related')

    dropboxAction(id, 'open')
})
$('.search-input').on('blur', function(event) {
    // event.stopPropagation()
    const id = this.getAttribute('data-related')

    dropboxAction(id, 'close')
})

/* QUANDO CLICAR NO X, LIMPAR FORMULÁRIO */
$('.clear').on('click', function() {
    const related = this.getAttribute('data-related')
    $(`#search-${related}`).val('')
    $(`#search-${related}`).attr('readonly', false)
    $(`#hidden-${related}`).val('')

    $(`#clear-${related}`).toggle()

    $(`#search-options-list-${related}`).text('')
    $(`#no-text-${related}`).show()
})

/* QUANDO CLICAR EM UM ITEM DA LISTA */
$('body').on('mousedown', '.input-option', function(event) {
    const related = this.getAttribute('data-related')
    const id = this.getAttribute('data-id')
    const multiple = !!Number($(`#search-${related}`).attr('data-multiple'))

    if (!multiple) {
        $(`#search-${related}`).val(this.innerText)
        $(`#search-${related}`).attr('readonly', true)
        $(`#search-${related}`).trigger('change')
        $(`#hidden-${related}`).val(id)
    } else {
        for (let item of $(`.search-${related}-item`)) {
            if (id == item.getAttribute('data-id')) return
        }

        $(`#search-select-${related}`).show()
        $(`#search-select-${related}`).append(`
            <li
                id="search-list-option-${related}-${id}"
                data-related="${related}"
                data-id="${id}"
                class="multiple-select-item search-${related}-item"
            >
                <div class="close-item-icon close-search-icon">
                    <svg width="18" class="close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <p>${this.innerText}</p>
                <input type="hidden" name="${related}[]" value="${id}">
            </li>
        `)
    }
})


$('body').on('click', '.multiple-select-item', function(event) {
    this.parentNode.removeChild(this)
})
