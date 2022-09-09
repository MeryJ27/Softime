$(document).ready(function () {
    var maxRows = 5;
    var totalRows = $('table tbody tr').length;
    var pagenum = Math.ceil(totalRows / maxRows);

    renderizarTabla(maxRows);
    renewPagination(pagenum);
    createPagination(maxRows, totalRows, pagenum);
    navegacion(pagenum, maxRows);
    fixButtons(pagenum);

    $('#search').keyup(function () {
        search_table($(this).val());
    });

    function search_table(value) {
        if (value == "") {
            var maxRowsSearch = parseInt($('#maxRows').val());
            var totalRowsSearch = $('table tbody tr').length;
            var pagenumSearch = Math.ceil(totalRowsSearch / maxRowsSearch);

            renderizarTabla(maxRowsSearch);
            renewPagination(pagenumSearch);
            createPagination(maxRowsSearch, totalRowsSearch, pagenumSearch);
            navegacion(pagenumSearch, maxRowsSearch);
            fixButtons(pagenumSearch);
        } else {
            $('#usuariosTabla tbody tr').each(function () {
                var found = false;
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = true;
                    }
                });

                if (found === true) {
                    var trnumSearch = 0;
                    var maxSearch = 5000;
                    $(this).each(function () {
                        $(this).show();
                        $('table tbody tr:visible').each(function () {
                            trnumSearch++;
                            if (trnumSearch > maxSearch) {
                                $(this).hide();
                            }
                            if (trnumSearch <= maxSearch) {
                                $(this).show();
                            }
                        });
                    });
                    renewPagination();
                    deshabilitarBotones();
                } else {
                    $(this).hide();
                    renewPagination();
                    deshabilitarBotones();
                }
            });
        }
    }

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

});

$('#maxRows').on("change", function () {
    $('.ulPaginacion').html();
    var maxRows = parseInt($(this).val());
    var totalRows = $('table tbody tr').length;
    var pagenum = Math.ceil(totalRows / maxRows);

    renderizarTabla(maxRows);
    renewPagination();
    createPagination(maxRows, totalRows, pagenum);
    navegacion(pagenum, maxRows);
    fixButtons(pagenum);
});

function renderizarTabla(max) {
    var trnum = 0;
    var maxRows = max;
    $('table tr:gt(0)').each(function () {
        trnum++;
        if (trnum > maxRows) {
            $(this).hide();
        }
        if (trnum <= maxRows) {
            $(this).show();
        }
    });
}

function createPagination(max, totalRows, pageNum) {
    if (totalRows > max) {
        for (var i = 1; i <= pageNum;) {
            $('.insertLi').append(`<li class="pageItem" data_page="${i}">\<span class="pageLink">${i++}<span class="sr-only">(current)</span></span>\</li>`).show();
        }
    }
}

function navegacion(pagenum, maxRows) {
    $('.ulPaginacion li:first-child').addClass('active');
    $('.ulPaginacion li').on('click', function () {
        var pageNum = $(this).attr('data_page');
        var trIndex = 0;
        var prevPage = pageNum - 1;
        var nextPage = parseFloat(pageNum) + parseFloat(1);

        if (nextPage > pagenum) {
            $('.nextPage').addClass('disabled');
        } else {
            $('.nextPage').removeClass('disabled');
            $('.nextPage').attr('data_page', `${nextPage}`);
        }

        if (prevPage == 0) {
            $('.prevPage').addClass('disabled');
        } else {
            $('.prevPage').removeClass('disabled');
            $('.prevPage').attr('data_page', `${prevPage}`);
        }

        var currentPage = $("ul").find(`[data_page='${pageNum}']`);
        $('.ulPaginacion li').removeClass('active');
        currentPage.addClass('active');
        $('.prevPage').removeClass('active');
        $('.nextPage').removeClass('active');

        $('table tr:gt(0)').each(function () {
            trIndex++;
            if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
}

function fixButtons(pagenum) {
    $('.prevPage').removeClass("active");
    $('.prevPage').addClass("disabled");
    $('.nextPage').removeClass("active");
    if (2 > pagenum) {
        $('.nextPage').addClass("disabled");
    }
}

function renewPagination() {
    $('.insertLi li').remove();
    $('#prevPageButton').remove();
    $('#nextPageButton').remove();
    $('.insertPrevButton').append('<li class="pageItem prevPage" id="prevPageButton" data_page="1"><span class="pageLink"><i class="bx bx-left-arrow-alt"></i></span></li>').show();
    $('.insertNextButton').append(`<li class="pageItem nextPage" id="nextPageButton" data_page="2"><span class="pageLink"><i class="bx bx-right-arrow-alt"></i></span></li>`).show();
}

function deshabilitarBotones() {
    $('.nextPage').addClass("disabled");
    $('.prevPage').addClass("disabled");
}
