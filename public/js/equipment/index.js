function fillSerialNumberForm(kolicina, equipment_id)
{
    var inputsPerRow = 3;
    var container = $('#dynamic-inputs' + equipment_id);

    for (var i = 0; i < kolicina; i++) {
        if (i % inputsPerRow === 0) {
            container.append('<div class="row"></div>');
        }
        var row = container.children('.row').last();
        row.append(
            '<div class="input-group">' +
            '<label for="input' + (i+1) + '">Input ' + (i+1) + '</label>' +
            '<input type="text" name="inputs' + equipment_id + '" id="input' + (i+1) + '">' +
            '</div>'
        );
    }
}