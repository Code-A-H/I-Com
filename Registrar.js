function desplegarEst(checkbox){
    //alert("fg");
    if(checkbox.checked){
        document.getElementById("DataEst").style.display="block";
    }else{
        document.getElementById("DataEst").style.display="none";
    }
}
function desplegarTrab(checkbox){
    if(checkbox.checked){
        document.getElementById("DataTra").style.display="block";
    }else{
        document.getElementById("DataTra").style.display="none";
    }
}