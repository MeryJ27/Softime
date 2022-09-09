$(document).ready(function () {
    $('.inputContainer input').each(function () {
        $(this).bind('keyup', validarForm);
        $(this).bind('click', validarForm);
    })
})

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{2,40}$/, // Letras y espacios, pueden llevar acentos.
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    password: /^.{8,12}$/,
    cedula: /^\d{6,10}$/,
    celular: /^\d{10,10}$/,
    direccion: /^[a-zA-Z0-9\_\-\#\s]{4,90}$/
}

function validarForm(e) {
    switch (e.target.name) {
        case "nombres": validarCampo(expresiones.nombre, e.target);
            break;
        case "apellidos": validarCampo(expresiones.nombre, e.target);
            break;
        case "username": validarCampo(expresiones.usuario, e.target);
            break;
        case "direccion": validarCampo(expresiones.direccion, e.target);
            break;
        case "identificacion": validarCampo(expresiones.cedula, e.target);
            break;
        case "telefono": validarCampo(expresiones.celular, e.target);
            break;
        case "correo": validarCampo(expresiones.email, e.target);
            break;
        case "confCorreo": sameValue(e.target, $('input[name="correo"]'));
            break;
        case "password": validarCampo(expresiones.password, e.target);
            break;
        case "confPassword": sameValue(e.target, $('input[name="password"]'));
            break;
    }
    validarBtn();
}

function validarCampo(expresion, input) {
    if (expresion.test(input.value)) {

        $(input).removeClass('invalid');
        $(input).addClass('valid');
        $(input).removeAttr('estado');
    } else {

        $(input).removeClass('valid');
        $(input).addClass('invalid');
        $(input).attr('estado', 'wrong');
    }
}

function validarBtn() {
    var inputsInvalidos = $('.inputContainer input[estado="wrong"]');

    if (inputsInvalidos.length >= 1) {
        $('#btnFormCrear').addClass('formInvalid');
    } else {
        $('#btnFormCrear').removeClass('formInvalid');
    }
}

function sameValue(input1, input2) {
    if (input1.value == input2.val()) {
        $(input1).removeClass('invalid');
        $(input1).addClass('valid');
        $(input1).removeAttr('estado');
    } else {
        $(input1).removeClass('valid');
        $(input1).addClass('invalid');
        $(input1).attr('estado', 'wrong');
    }
}