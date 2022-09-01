const detallesbtn = document.getElementById("detallesbtn");
const miscomprasbtn = document.getElementById("miscomprasbtn");

if (miscomprasbtn) {
    miscomprasbtn.addEventListener("click", function () {
        document.querySelector('.page1').classList.add('move');
    });
}


detallesbtn.addEventListener("click", function () {
    document.querySelector('.page1').classList.remove('move');
});

if ($(document).find('table tbody .btnActions').length >= 1) {
    var btnMenuID = 0;
    var menuID = 0;
    $(document).find('.btnActions').each(function () {
        btnMenuID++;
        $(this).attr('btn_action', btnMenuID);
    })

    $(document).find('.menuAcciones').each(function () {
        menuID++;
        $(this).attr('menu_acciones', menuID);
    })
}

$('.btnActions').on('click', function () {
    var btnID = $(this).attr('btn_action');
    var menuMostrar = $(`.menuAcciones[menu_acciones="${btnID}"]`);
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $('.btnActions').removeClass('active');
        $(this).addClass('active');
    }

    if ($(menuMostrar).hasClass('show')) {
        $(menuMostrar).removeClass('show');
    } else {
        $('.menuAcciones').removeClass('show');
        $(menuMostrar).addClass('show');
    }
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
        case "username":
            validarCampo(expresiones.usuario, e.target);
            break;
        case "nombre":
            validarCampo(expresiones.nombre, e.target);
            break;
        case "apellido":
            validarCampo(expresiones.nombre, e.target);
            break;
        case "cedula":
            validarCampo(expresiones.cedula, e.target);
            break;
        case "telefono":
            validarCampo(expresiones.celular, e.target);
            break;
        case "email":
            validarCampo(expresiones.email, e.target);
            break;
        case "direccion":
            validarCampo(expresiones.direccion, e.target);
            break;
    }
}

function validarCampo(expresion, input) {

    if (expresion.test(input.value)) {
        $(input).removeClass('invalid');
        $(input).removeAttr("estado");
    } else {
        $(input).addClass('invalid');
        $(input).attr("estado", "wrong");
    }

    validarFormButton();

}

function validarFormButton() {
    var inputsInvalidos = $('.inputInfoDetail[estado="wrong"]');
    if (inputsInvalidos.length >= 1) {
        $('#btnInfo').addClass('invalid');
    } else {
        $('#btnInfo').removeClass('invalid');
    }
}

$('#btnInfo').on('click', function () {
    var actionBtn = $(this).attr("action");

    if (actionBtn == "editar") {
        $(".optiondescriptiondetails").each(function (index) {
            $(this).html(`<input class="inputInfoDetail" name="${$(this).attr('dataCampo')}" value="${$(this).find('span').text()}"></input>`);
        });

        $(this).find("span").text("Guardar"); //cambiar texto boton
        $(this).attr("action", "guardar");
        $('#btnInfo').addClass('invalid');

        $('.inputInfoDetail').each(function () {
            $(this).bind('keyup', validarForm);
            $(this).bind('click', validarForm);
        });
    } else if (actionBtn = "guardar") {
        console.log("funcion guardar");
        var inputs = document.querySelectorAll('.inputInfoDetail');
        var data = {
            "username": inputs[0].value,
            "nombres": inputs[1].value,
            "apellidos": inputs[2].value,
            "cedula": inputs[3].value,
            "telefono": inputs[4].value,
            "correo": inputs[5].value,
            "direccion": inputs[6].value,
        }

        $.ajax({
            type: "post",
            url: "backend/actualizarInfo.php",
            data: data,
            beforeSend: function () {
                $(".btnInfoDetails").find("span").text("Actualizando");
                $(".btnInfoDetails").attr("action", "updating");
                $(".inputInfoDetail").each(function () {
                    $(this).prop('disabled', true);
                });
            },
            success: function (response) {
                if (response == "insertado") {
                    $(".optiondescriptiondetails").each(function (index) {
                        $(this).html(`<span>${inputs[index].value}</span>`);
                    });
                    $("#nombreClienteProfile").text(inputs[1].value);
                    $("#cedulaClienteProfile").text(inputs[3].value);
                    $(".btnInfoDetails").find("span").text("Editar");
                    $(".btnInfoDetails").attr("action", "editar");
                } else {
                    $(".btnInfoDetails").find("span").text("Error");
                }
            }
        });
    }
});