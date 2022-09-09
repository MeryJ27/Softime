function changeStatus(estado, id) {
    var data = {
        "estado": estado,
        "id": id
    }

    $.ajax({
        type: "post",
        url: "backend/cambiarEstado.php",
        data: data,
        success: function (res) {
            if (res == "Activo") {
                $(`.estado[id_estado="${id}"]`).html(`<span class="activo">Activo</span></th>`);
                $(`.menuAcciones[id_estado="${id}"]`).find(`span.changeStatus`).attr("onclick", `changeStatus("Activo", ${id})`);
            } else if (res == "Inactivo") {
                $(`.estado[id_estado="${id}"]`).html(`<span class="inactivo">Inactivo</span></th>`);
                $(`.menuAcciones[id_estado="${id}"]`).find(`span.changeStatus`).attr("onclick", `changeStatus("Inactivo", ${id})`);
            }
        }
    });
}

$('#closeButton').on('click', () => {
    $('.detailsControl').removeClass('activo');
});

var detailsControlActivo;


function openControlDetails(id) {
    $('.detailsControl').addClass("activo");
    $('.detailsControl').attr("userID", id);
    detailsControlActivo = id;

    var data = {
        'userID': id,
    };

    $.ajax({
        type: "POST",
        url: "backend/obtenerClienteId.php",
        data: data,
        success: function (response) {
            let dataUser = JSON.parse(response);
            $('section.detailsControl .header').find('h4').text(`${dataUser.nombres}`);
            $('.contentDetailsControl').html(`
            <div class="itemDetailsControl">
            <span class="itemName">Cargo:</span>
            <div class="itemValue" dataCampo="rol" id="rolCampo" dataType="select">
                <span>${dataUser.rol}</span>
            </div>
        </div>
        <div class="itemDetailsControl">
            <span class="itemName">Username:</span>
            <div class="itemValue" dataCampo="username" dataType="input">
                <span>${dataUser.username}</span>
            </div>
        </div>
        <div class=" itemDetailsControl">
            <span class="itemName">Estado:</span>
            <div class="itemValue" dataCampo="estado" id="estadoCampo" dataType="select">
                <span>${dataUser.estado}</span>
            </div>
        </div>
        <div class="itemDetailsControl">
            <span class="itemName">Nombre:</span>
            <div class="itemValue" dataCampo="nombre" dataType="input">
                <span>${dataUser.nombres}</span>
            </div>
        </div>
        <div class="itemDetailsControl">
            <span class="itemName">Apellido:</span>
            <div class="itemValue" dataCampo="apellido" dataType="input">
                <span>${dataUser.apellidos}</span>
            </div>
        </div>
        <div class="itemDetailsControl">
            <span class="itemName">Cédula de Ciudadanía:</span>
            <div class="itemValue" dataCampo="identificacion" dataType="input">
                <span>${dataUser.identificacion}</span>
            </div>
        </div>
        <div class="itemDetailsControl">
            <span class="itemName">Telefono:</span>
            <div class="itemValue" dataCampo="telefono" dataType="input">
                <span>${dataUser.telefono}</span>
            </div>
        </div>
        <div class="itemDetailsControl">
            <span class="itemName">Correo:</span>
            <div class="itemValue" dataCampo="correo" dataType="input">
                <span>${dataUser.correo}</span>
            </div>
        </div>
        <div class="itemDetailsControl">
            <span class="itemName">Direccion:</span>
            <div class="itemValue" dataCampo="direccion" dataType="input">
                <span>${dataUser.direccion}</span>
            </div>
        </div>
        <div class="itemDetailsControl">
            <span class="itemName">Contraseña:</span>
            <div class="itemValue" dataCampo="contraseña" dataType="input">
                <span>Oculto</span>
            </div>
        </div>`);

            $('section.detailsControl').find('.footerSeccion').html(`<div class="btnInfoDetails" action="editar" id="btnInfo"><span>Editar</span></div>`);

            $('#btnInfo').on('click', function () {
                var actionBtn = $(this).attr("action");
                let idB = $('body').attr("uId");

                if (actionBtn == "editar") {
                    $('.itemValue[dataType="input"]').each(function () {
                        $(this).html(`<input class="inputEdit" type="text" name="${$(this).attr("dataCampo")}" value="${$(this).find('span').text()}">`);
                    });

                    if (idB != detailsControlActivo) {
                        $("#rolCampo").html(`<select class="selectEdit"><option value="1">Cliente</option><option value="2">Administrador</option></select>`);
                        $("#estadoCampo").html(`<select class="selectEdit"><option value="Activo">Activo</option><option value="Inactivo">Inactivo</option></select>`);
                    }

                    $(this).find("span").text("Guardar");
                    $(this).attr("action", "guardar");
                } else if (actionBtn == "guardar") {
                    var inputs = document.querySelectorAll('.inputEdit');
                    var selects = document.querySelectorAll('.selectEdit');
                    //console.log(selects[0].value);
                    //console.log(selects[0].options[selects[0].selectedIndex].text);
                    var data = {
                        "userID": $('.detailsControl').attr("userID"),
                        "rol": selects[0].value,
                        "username": inputs[0].value,
                        "estado": selects[1].value,
                        "nombres": inputs[1].value,
                        "apellidos": inputs[2].value,
                        "identificacion": inputs[3].value,
                        "telefono": inputs[4].value,
                        "correo": inputs[5].value,
                        "direccion": inputs[6].value,
                        "password": inputs[7].value
                    }
                    $.ajax({
                        type: "POST",
                        url: "backend/actualizarInfoControl.php",
                        data: data,
                        success: function (response) {
                            console.log(response);
                            location.reload();
                        }
                    });
                }
            });
        }
    });
}

