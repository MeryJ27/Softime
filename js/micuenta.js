const detallesbtn = document.getElementById("detallesbtn");
const miscomprasbtn = document.getElementById("miscomprasbtn");

miscomprasbtn.addEventListener("click", function () {
    document.querySelector('.page1').classList.add('move');
});

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