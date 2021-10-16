function Exportar(){
    var tab = document.getElementById("reportes").innerHTML;
    var nombre = document.getElementById("nombreArchivo").innerHTML+".xls";

    var form = "<center>"+
    "<form method='post' action='../Config/Excel.php'>"+
    "<input type='hidden' value='"+tab.replace(/'/g, "&#39;")+"' name='tabla' id='textoExportador'>"+
    "<input type='hidden' value='"+nombre+"' name='nombreArchivo'>"+
    "<input type='submit' value='Exportar' class='form-control btn btn-primary btn-outline-primary'>"+
    "</form>"+
    "</center>";
    $("#boton_exportar").append(form);
}