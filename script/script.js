console.log('Working');


const form = document.querySelector('.form')
const textarea = document.querySelector('.form__textarea')
const formResponse = document.querySelector('.form-response')

var xhr = new XMLHttpRequest();

const cachingCorrection = ( str ) => {
    
    const p_result = document.createElement('p')
    p_result.className = 'form-response__query'

    p_result.innerHTML = `${str}`
    console.log(p_result.innerHTML);
    const spans = p_result.querySelectorAll('span')
    spans.forEach(span => span.style.fontWeight = 'bold')

    formResponse.insertAdjacentHTML('afterbegin', p_result.outerHTML)
}

const correction = ( str ) => {
    
    
    // textarea.insertAdjacentHTML(`afterbegin`, p_result.outerHTML)
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
            cachingCorrection(response)
            console.log(response);
        }
    })

}

form.addEventListener('submit', requestHandler)