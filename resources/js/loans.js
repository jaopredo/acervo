function addDaysToDate(inputDate, daysToAdd) {
    const date = new Date(inputDate);
    date.setDate(date.getDate() + daysToAdd);

    const year = date.getFullYear();
    const month = (date.getMonth() + 1).toString().padStart(2, '0');
    const day = date.getDate().toString().padStart(2, '0');

    return `${year}-${month}-${day}`;
}


/* INDEX */
$('#loan-type-selection').on('change', function(e) {
    const { value } = e.target

    const { origin } = window.location

    if (value == 0) {
        window.location = `${origin}/loans?filters[expire_date][gt]=${addDaysToDate(Date.now(), 0)}`
    } else if (value == 1) {
        window.location = `${origin}/loans?filters[expire_date][eq]=${addDaysToDate(Date.now(), 0)}`
    } else {
        window.location = `${origin}/loans?filters[expire_date][lt]=${addDaysToDate(Date.now(), 0)}`
    }
})


/* FORMULÁRIO DE CRIAÇÃO */
$('#search-student_id').on('change', function (event) {
    const { value } = event.target

    $('#student_name').val(value)
})

$('#search-book_id').on('change', function (event) {
    const { value } = event.target

    $('#book_name').val(value)
})

$('#yes').on('click', function() {
    $("#student-id-container").show()
    $("#student-name-container").hide()

    $('#no').attr('checked', 'false')
})
$('#no').on('click', function() {
    $("#student-id-container").hide()
    $("#student-name-container").show()
})


$('#loan_date').on('change', function (e) {
    $('#expire_days').trigger('change')
})

$("#expire_selection").on('change', function(event) {
    const { value } = event.target

    if (value == 0) {
        $('#expire-days-form').show()
    } else {
        $('#expire-days-form').hide()

        $('#expire_days').val(value)
        $('#expire_days').trigger('change')
    }
})


$('#expire_days').on('change', function(event) {
    let { value } = event.target
    value = Number(value)

    $('#expire_date').val(addDaysToDate($('#loan_date').val(), value+1))
})
