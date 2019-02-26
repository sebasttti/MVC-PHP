var getController = function(){
    var loc = String(window.location);
    var res = loc.split("/");
    return res[4];
}

var getMethod = function(){
    var loc = String(window.location);
    var res = loc.split("/");
    return res[5];
}

var method = getMethod();
var agregar = document.getElementById("a.agregar");

if (method == 'agregar' ) {
    agregar.classList.add('hidden');
}else{
    agregar.classList.remove('hidden');
}
