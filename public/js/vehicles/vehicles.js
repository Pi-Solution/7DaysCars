function submit_form(id){
    var form = document.getElementById('form');
    var form_input = document.getElementById('form_input');
    form_input.value = id;
    console.log(form_input.value)

    form.submit();
}
