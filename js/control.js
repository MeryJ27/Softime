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