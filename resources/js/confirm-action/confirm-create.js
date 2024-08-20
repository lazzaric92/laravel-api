document.querySelector('form.create-form').addEventListener('submit', function(event){
    event.preventDefault();
    if(window.confirm('Are you satisfied?') === true){
        this.submit();
    }
})
