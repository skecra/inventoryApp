
function fillPositions(position_id = null ){

    let department_id = $('#department_id').val();
    // console.log(department_id)
    $.ajax({
        'url' : '/departments/positions-by-department/' + department_id,
        'type' : 'get',
        'success' : (response) => {
            let options = `<option disabled value=''>--select position--</option>`
            response.forEach(function (e){
                let selected = ''
                if (position_id && position_id == e.id){
                    selected = 'selected'
                }
                options += `<option ${selected} value='${e.id}'>${e.name}</option>`
            })
            $('#position_id').html(options);
        }
    })

}
