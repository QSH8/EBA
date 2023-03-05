console.log('Working');


const form = document.querySelector('.form')
const textarea = document.querySelector('.form__textarea')
const formResponse = document.querySelector('.form-response')

var xhr = new XMLHttpRequest();

const check = ( event ) => {
    event.preventDefault()
    const correct_value = event.target.value 
    const data = { correct_value }
    $.ajax({
        type: "post",
        url: "index.php",
        data: data,
        success: ( response ) => {
            correction(response)
        }
    })
}

const correction = ( str ) => {
    
    const p_result = document.createElement('p')
    p_result.className = 'form-response__query'

    p_result.innerHTML = `${str}`



    formResponse.insertAdjacentHTML('afterbegin', p_result.outerHTML)
}

const requestHandler = ( event ) => {
    event.preventDefault()
    const check_value = event.target.textarea.value
    const data = { check_value }

    $.ajax({
        type: "post",
        url: "index.php",
        data: data,
        success: ( response ) => {
            correction(response)
            textarea.onchange = (event) => check(event)
        }
    })

}

form.addEventListener('submit', requestHandler)

