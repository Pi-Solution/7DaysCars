function submit_form(id, d_value){
    //form
    var form = document.getElementById('update_post')
    //admin verification
    var input = document.getElementById('admin_verification');
    //id
    var input_id = document.getElementById('vehicle_id');
    //category
    var category = document.getElementById(`category${id}`);

    var category_input = document.getElementById('category_input');

    category_input.value = category.value
    input.value = d_value;
    input_id.value = id;
    form.submit();
}
