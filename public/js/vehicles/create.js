
window.onload = () => {
    /**
     * Show uploaded Image
     *
     * This function takes the file input type and every time end user upload file
     * name and size of file is shown
     */
    var file_input = document.getElementById('vehicle_image');
    file_input.addEventListener('change', function () {
        let alert_window = document.getElementById('image_prew');
        if (this.files.length > 0) {
            alert_window.innerHTML = `
            <div class="alert alert-info mt-4" role="alert">
                Selected file:  ${this.files.item(0).name} <strong id="image_button" onclick="remove_file()">x</strong>
            </div>
            `
        } else {
            alert_window.innerHTML = ""
        }
    });
}
/**
 * Remove Alert Box on click
 *
 */
function remove_file(){
    console.log('hello')
    document.getElementById('vehicle_image').value = "";
    document.getElementById('image_prew').innerHTML = ""
}

