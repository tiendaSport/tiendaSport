// Función para sortear desde la A hasta la Z
function sortAZ() {
    console.log('sortAZ clicked');
    var form = document.getElementById('searchform');
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'sort_order';
    input.value = 'asc';
    form.appendChild(input);
    form.submit();
}
// Función para sortear desde la Z hasta la A
function sortZA() {
    console.log('sortZA clicked');
    var form = document.getElementById('searchform');
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'sort_order';
    input.value = 'desc';
    form.appendChild(input);
    form.submit();
}
function sortMaxMin(){}

function sortMinMax(){}
