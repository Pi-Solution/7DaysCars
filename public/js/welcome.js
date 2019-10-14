function get_data(){
    let category_id = document.getElementById('categories').value;
    const api = 'api/category/';
    //console.log(category_id);

    fetch(api + category_id)
    .then(response => response.json())
    .then(data => {
        console.log(data) // Prints result from `response.json()` in getRequest
        print_out_data(data)
    })
}

function print_out_data(data){
    let vehicle_div =  document.getElementById('vehicles')

    vehicle_div.innerHTML = ""

    for (let index = 0; index < data.length; index++) {
        vehicle_div.innerHTML += `
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2 rounded p-5 border border-dark">
                <div class="row">
                    <div class="col-md-4 border border-dark rounded p-0">
                        <div class="img_div">
                            <img src="../storage/app/public/${data[0].vehicle_image}" class="card_img">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col">
                                <h4><strong>${data[0].name}</strong></h4>
                            </div>
                            <div class="col text-right">
                                <h4>${data[0].price} KM</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>${data[0].maker}</h4>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm mr-0 pr-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Manufacture Year :</li>
                                    <li class="list-group-item">Mileage :</li>
                                    <li class="list-group-item pl-0">
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm ml-0 pl-0 text-right">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">${data[0].manufacture_year}</li>
                                    <li class="list-group-item">${data[0].mileage}</li>
                                    <li class="list-group-item pl-0 pr-0">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `
    }
}
