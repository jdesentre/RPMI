<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ejemplo de AJAX</title>
</head>

<body>
<input type="text" id="username">
<button onClick="loadDoc()" >Comprobar</button>
<span id="resultado"></span>
<script>
function loadDoc() {
	var inputValue = document.getElementById('username').value;
	//Ejecuto la consulta AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultado").innerHTML = this.responseText;
       }
    };
    xhttp.open("GET", "include/ajax.php?u=" + inputValue, true);
    xhttp.send(); 
}
</script>

</body>
</html>