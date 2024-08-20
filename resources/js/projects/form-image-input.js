const radioInputEls = document.querySelectorAll('input.image-radio');
const imgUrlInputEl = document.querySelector('input.image-url');
const imgFileInputEl = document.querySelector('input.image-file');


radioInputEls.forEach((radioInputEl) => {
    radioInputEl.addEventListener('click', function(){
        const value = radioInputEl.getAttribute('value');

        // ! '0' = File ; '1' = Url

        // <-- when creating, the file radio button is checked

        // # click on radio label 'Url'
        if(value === '0' && imgFileInputEl.classList.contains('d-none') && !imgUrlInputEl.classList.contains('d-none')){
            imgFileInputEl.classList.remove('d-none');
            imgUrlInputEl.classList.add('d-none');
        }
        // # click on radio label 'File'
        else if (value === '1' && imgUrlInputEl.classList.contains('d-none') && !imgFileInputEl.classList.contains('d-none')){
            imgFileInputEl.classList.add('d-none');
            imgUrlInputEl.classList.remove('d-none');
        }
    })

    // <-- in case of errors or in edit, the input value is populated
    if(imgUrlInputEl.getAttribute('value') !== '' && imgUrlInputEl.getAttribute('value').startsWith('http')){
        imgFileInputEl.classList.add('d-none');
        imgUrlInputEl.classList.remove('d-none');
    }
})





