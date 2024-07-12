
function fillPositions(){

    let department_id = $('#department_id').val();
    // console.log(department_id)
    $.ajax({
        'url' : '/departments/positions-by-department/' + department_id,
        'type' : 'get',
        'success' : (response) => {
            let options = `<option selected disabled value=''>--select department--</option>`
            response.forEach(function (e){
                options += `<option selected disabled value='${e.id}'>${e.name}</option>`
            })
            $('#position_id').html(options);
        }
    })

}
