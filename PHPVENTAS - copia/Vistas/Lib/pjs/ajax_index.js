/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

   function getOnclickForm(URL) {
            var btn=document.getElementById("btnenv").value;
            var get_url = URL+"?btnenv="+btn; // El script a dónde se realizará la petición.
            $.ajax({
                type: "GET",
                url: get_url,
                data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
                success: function (data)
                {
                    getcargarURL(URL+'?bus=Mostrar');
                    //alert('Datos registrado');
                }
            });
    }
   
    function getcargarURL(URL) {
        var load = document.getElementById("warningGradientOuterBarG");
        $.ajax({
            beforeSend: function (xhr) {
                load.style.display = 'block';
            },
            type: 'GET',
            url: URL,
            data: {},
            success: function (datos) {
                load.style.display = 'none';
                $('#tabla').html(datos);
            },
            error: function (obj, mens, thrown) {
                load.style.display = 'none';
                $('#tabla').html('Error en la Web: ' + mens + ' ' + obj + ' ' + thrown);
            }
        });
    }

    function getEliminar(URL,dato) {
        getcargarURL(URL+'?btnEli=' + dato + '&bus=Mostrar');
    }
    function getEditar(URL,dato) {
        getcargarURL(URL+'?edi=' + dato + '&boton=Actualizar');
    }
    function getIner(btn,lbl){
        var data=document.getElementBYId(btn).value;
        document.getElementBYId(lbl).innerHTML=data;
    }
