$(document).ready(function () { // = $(function(){ ...
    var airportArea = document.querySelector('#selectDep');
    $("#search").keyup(function () {
        let letters = $(this).val();
        if (letters.length > 0) {
            airportArea.innerHTML = ''
            $.ajax({
                url: 'index.php?controller=ajax&action=airports',
                type: 'GET',
                data: { letters: letters },
                dataType: 'json',
                success: function (data, statut) {
                      airportArea.innerHTML = '<select id="airportDepSelect" name="airportDep" class="form-control mt-3" ></select>'
                     for (let i = 0; i < data.length; i++) {
                         document.querySelector('#airportDepSelect').innerHTML += `<option value="${data[i].airportID}">${data[i].cityName} - ${data[i].airportName}</option>`
                    } 
                }
            });
        } 
    });
});