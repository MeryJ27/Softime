/*para ejecutar codigo dentro de la pagina cuando se carga */

$(document).ready(function() {
    $(function() {
        /*variables*/
        var inputId = 0;
        var inputgroupid = 0;
        var inputiconid = 0;
        /*each=cada, por objeto ejecuta la funcion*/
        $('.inputgroup').each(function() {
            inputgroupid++;
            /*this= objeto que se llama, attr= funcion, agregar atributo al objeto html*/
            $(this).attr('inputgroup-id', inputgroupid);
        });
        $('.inputgroup input').each(function() {
            inputId++;
            $(this).attr('input-id', inputId);
        });
        $('.inputgroup i').each(function() {
            inputiconid++;
            $(this).attr('inputicon-id', inputiconid);
        });
    })
});

/*bind=funcion, agregar evento y cuando éste se ejecute haga una funcion, keyup=evento, levantar tecla*/
$('.formularioRegistro').each(function() {
    $(this).bind('keyup', validarForm);
    $(this).bind('click', validarForm);
})

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // Letras y espacios, pueden llevar acentos.
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    password: /^.{8,12}$/
}

/*e=evento, target=objetivo, if=si es x ejecutar y, switch=en caso de, break=romper*/
function validarForm(e) {
    switch (e.target.name) {
        case "nombres":
            validarCampo(expresiones.nombre, e.target);
            break;
        case "apellidos":
            validarCampo(expresiones.nombre, e.target);
            break;
        case "email":
            validarCampo(expresiones.email, e.target);
            break;
        case "password":
            validarCampo(expresiones.password, e.target);
            break;
        case "confirmar_password":
            validarCampo(expresiones.password, e.target);
            break;
    }
}

function validarCampo(expresion, input) {
    var inputID = input.attributes[5].nodeValue;
    var inputActivo = $(`.inputFormulario[input-id="${inputID}"]`);
    var inputgroupActivo = $(`.inputgroup[inputgroup-id="${inputID}"]`);
    var inputiconActivo = $(`.inputgroup i[inputicon-id="${inputID}"]`);

    if (expresion.test(input.value)) {
        $(inputgroupActivo).removeClass('campoIncorrecto');
        $(inputiconActivo).removeClass('colorincorrecto');
        $(inputgroupActivo).addClass('campoCorrecto');
        $(inputiconActivo).addClass('colorcorrecto');
    } else {
        $(inputgroupActivo).removeClass('campoCorrecto');
        $(inputiconActivo).removeClass('colorcorrecto');
        $(inputgroupActivo).addClass('campoIncorrecto');
        $(inputiconActivo).addClass('colorincorrecto');

    }
}