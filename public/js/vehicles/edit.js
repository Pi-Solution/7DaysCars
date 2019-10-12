function submit_form(id, d_value){
    var form = document.getElementById('update_post')
    var input = document.getElementById('admin_verification');
    var input_id = document.getElementById('vehicle_id')
    input.value = d_value;
    input_id.value = id;
    form.submit();
}
