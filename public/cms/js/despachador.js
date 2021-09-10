function delete_object(e) {
    e.preventDefault();
    var path = this.getAttribute('data-path');
    var object = this.getAttribute('data-object');
    var action = this.getAttribute('data-action');
    var url = base + '/' + path + '/' + object + '/' + action;
    var title, text, icon;
    if(action == "delete"){
        title = "¿Estas seguro que quieres eliminar este archivo?";
        text = "Una vez eliminado, ¡podrás recuperarlo desde la papelera!";
        icon = "warning";
    }
    if(action == "restore"){
        title = "¿Estas seguro que quieres restaurar este archivo?";
        text = "Una vez restaurado, ¡podrás editarlo!";
        icon = "info";
    }
    //console.log(object, path);
    swal({
        title: title,
        text: text,
        icon: icon,
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            window.location.href = url;
        }
      });
}



/* ---------------------------------------------------
	Script - Tooltip
----------------------------------------------------- */
$(function () {
    //bootstrap-v4.4.1 - data-toggle="tooltip" data-placement="bottom" title="Tooltip on top"
    //$('[data-toggle="tooltip"]').tooltip()

    //bootstrap-v5.0.0 - data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on top"
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
})



/* ---------------------------------------------------
	Script - Saltar campos de formulario
             con la tecla enter
----------------------------------------------------- */
$("body").on("keydown", "input, select, textarea", function(e) {
    var self = $(this),
        form = self.parents("form:eq(0)"),
        focusable,
        next;
    // si presiono enter
    if (e.keyCode == 13) {
        // buscar siguiente elemento
        focusable = form.find("input,a,select,button,textarea").filter(":visible");
        next = focusable.eq(focusable.index(this) + 1);
        // si existe siguiente elemento, hacer focus
        if (next.length) {
            next.focus();
        } else {
            // si no existe otro elemento, hacer submit
            // esto lo podrías quitar pero creo que puede
            // ser bastante útil
            form.submit();
        }
        return false;
    }
});



/* ---------------------------------------------------
	Script - CKEditor
----------------------------------------------------- */
if(route == "product_add" || route == "product_edit" ){
    //var base = location.protocol+'//'+location.host;
    $(document).ready(function(){
        editor_init('editor');
    });
    function editor_init(field){
        //CKEDITOR.plugins.addExternal('codesnippet', base+'/static/libs/ckeditor/plugins/codesnippet/', 'plugin.js' );
        CKEDITOR.replace(field, {
            //skin: 'moono',
            //extraPlugins: 'codesnippet,ajax,xml,textmatch,autocomplete,textwatcher,emoji,panelbutton,preview,wordcount',
            toolbar:[
                { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo' ] },
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Unlink', 'Blockquote' ] },
                { name: 'document', items: [ 'CodeSnippet', 'EmojiPanel', 'Preview', 'Source' ] },
            ]
        });
    };
};


/* global bootstrap: false */
(function () {
    'use strict'
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl)
    })
})()



// Botón Subir scroll
function detectarScroll(evento) {
    var scrollVertical = $(window).scrollTop(),
        scrollHoriontal = $(window).scrollLeft();
    //console.log(scrollVertical);
    //console.log(scrollHoriontal);
    return ( scrollVertical > 50 ) ? $('#subir').fadeIn() :  $('#subir').fadeOut();
}
$(window).on('scroll', detectarScroll);



// Mostramos el loaderProcesandoMensaje
$('#btn_enviar_mensaje').on('click', function () {
    $('.loaderProcesandoMensaje').fadeIn('slow');
});


