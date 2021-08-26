$("#email").change(function(){

    var email = $(this).val();
    
    var datos = new FormData();
    datos.append("validarEmail",email);

    $.ajax({
        
        url:"AJAX/formularios.ajax.php",
        method:"POST",
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            console.log("respuesta",respuesta)
        }

    })
})