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

let timeout = setTimeout(() => {
}, 0);

$('body').on('keypress', '.search-input', async function(event) {
    clearTimeout(timeout)

    const related = this.getAttribute('data-related')
    const endpointUrl = this.getAttribute('data-endpoint')
    const attr = this.getAttribute('data-attr')

    timeout = setTimeout(function() {
        const { value } = event.target
        const endpoint = `${endpointUrl}?filters[${attr}][like]=${value}`

        console.log(endpoint)

        if (value != "") {
            $(`#select-option-list-${related}`).text('')
            $(`#loading-${related}`).show()
            $(`#select-option-list-${related}`).show();
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
                                $(`#select-option-list-${related}`).append(`
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
$('.search-input').on('click', function(event) {
    event.stopPropagation()
    const id = this.getAttribute('data-related')

    $(`#${id}-button`).trigger('click')
})

/* QUANDO CLICAR */
$('body').on('click', '.input-option', function(event) {
    const related = this.getAttribute('data-related')
    const id = this.getAttribute('data-id')
    
    $(`#${related}`).val(this.innerText)
    $(`#${related}`).trigger('change')
    $(`#hidden-${related}`).val(id)
}) 

$('.final-input').on('click', function() {
    const related = this.getAttribute('data-related')

    $(`#search-${related}`).focus()
    $(`#${related}-button`).trigger('click')
})
