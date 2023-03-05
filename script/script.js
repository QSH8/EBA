console.log('Working');


const form = document.querySelector('.form')
const formResponse = document.querySelector('.form-response')

var xhr = new XMLHttpRequest();

const correction = ( str ) => {
    const p_result = document.createElement('p')
    p_result.className = 'form-response__query' 
    p_result.innerHTML = `${str}`
    formResponse.insertAdjacentHTML('afterbegin', p_result.outerHTML)
}

const requestHandler = ( event ) => {
    event.preventDefault()
    const value = event.target.textarea.value
    const data = { value }

    $.ajax({
        type: "post",
        url: "index.php",
        data: data,
        success: ( response ) => {
            correction(response)
            console.log(response);
        }
    })

}

form.addEventListener('submit', requestHandler)