/*para ejecutar codigo dentro de la pagina cuando se carga */

$(document).ready(function () {
    $(function () {
        /*variables*/
        var inputId = 0;
        var inputgroupid = 0;
        var inputiconid = 0;
        /*each=cada, por objeto ejecuta la funcion*/
        $('.inputgroup').each(function () {
            inputgroupid++;
            /*this= objeto que se llama, attr= funcion, agregar atributo al objeto html*/
            $(this).attr('inputgroup-id', inputgroupid);
        });
        $('.inputgroup input').each(function () {
            inputId++;
            $(this).attr('input_id', inputId);
        });
        $('.inputgroup i').each(function () {
            inputiconid++;
            $(this).attr('inputicon-id', inputiconid);
        });
    })
});

/*bind=funcion, agregar evento y cuando éste se ejecute haga una funcion, keyup=evento, levantar tecla*/
$('.formularioRegistro').each(function () {
    $(this).bind('keyup', validarForm);
    $(this).bind('click', validarForm);
})

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // Letras y espacios, pueden llevar acentos.
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    password: /^.{8,12}$/,
    cedula: /^\d{6,10}$/,
    celular: /^\d{10,10}$/
}

/*e=evento, target=objetivo, if=si es x ejecutar y, switch=en caso de, break=romper*/
function validarForm(e) {
    switch (e.target.name) {
        case "username":
            validarCampo(expresiones.usuario, e.target);
            break;
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
            samePassword();
            break;
        case "confirmar_password":
            samePassword();
            break;
    }
}

function samePassword() {
    var valuePassword = $(`.inputFormulario[name="password"]`);
    var valueConfPassword = $(`.inputFormulario[name="confirmar_password"]`);
    var idInputConf = valueConfPassword[0].attributes.input_id.nodeValue
    var inputgroupConf = $(`.inputgroup[inputgroup-id="${idInputConf}"]`);
    var inputiconConf = $(`.inputgroup i[inputicon-id="${idInputConf}"]`);

    if (valuePassword.val() == "" || valueConfPassword.val() == "") {
        $(inputgroupConf).removeClass('campoCorrecto');
        $(inputiconConf).removeClass('colorcorrecto');
        $(inputgroupConf).addClass('campoIncorrecto');
        $(inputiconConf).addClass('colorincorrecto');
        $(inputgroupConf).attr('estado', 'wrong');
    } else if (valuePassword.val() === valueConfPassword.val()) {
        $(inputgroupConf).removeClass('campoIncorrecto');
        $(inputiconConf).removeClass('colorincorrecto');
        $(inputgroupConf).addClass('campoCorrecto');
        $(inputiconConf).addClass('colorcorrecto');
        $(inputgroupConf).removeAttr('estado');
    } else {
        $(inputgroupConf).removeClass('campoCorrecto');
        $(inputiconConf).removeClass('colorcorrecto');
        $(inputgroupConf).addClass('campoIncorrecto');
        $(inputiconConf).addClass('colorincorrecto');
        $(inputgroupConf).attr('estado', 'wrong');
    }

    validarFormButton();
}

function validarCampo(expresion, input) {
    var inputID = input.attributes.input_id.nodeValue;
    var inputActivo = $(`.inputFormulario[input_id="${inputID}"]`);
    var inputgroupActivo = $(`.inputgroup[inputgroup-id="${inputID}"]`);
    var inputiconActivo = $(`.inputgroup i[inputicon-id="${inputID}"]`);

    if (expresion.test(input.value)) {
        $(inputgroupActivo).removeClass('campoIncorrecto');
        $(inputiconActivo).removeClass('colorincorrecto');
        $(inputgroupActivo).removeAttr('estado');
        $(inputgroupActivo).addClass('campoCorrecto');
        $(inputiconActivo).addClass('colorcorrecto');
    } else {
        $(inputgroupActivo).removeClass('campoCorrecto');
        $(inputiconActivo).removeClass('colorcorrecto');
        $(inputgroupActivo).addClass('campoIncorrecto');
        $(inputiconActivo).addClass('colorincorrecto');
        $(inputgroupActivo).attr('estado', 'wrong');
    }

    validarFormButton();
}

function validarFormButton() {
    var inputsInvalidos = $('.inputgroup[estado="wrong"]');
    if (inputsInvalidos.length >= 1) {
        $('#btnRegistro').addClass('invalid');
    } else {
        $('#btnRegistro').removeClass('invalid');
    }
}