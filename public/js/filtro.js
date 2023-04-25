$(document).ready(function () {
    maestroProductos();
    ingresosProductos();
    salidasProductos();
    kardexInventario();
    movimientoProductos();
});

function maestroProductos()
{
    var select1 = $('#m_maestroProductos #marca').parents('.form-group');
    var select2 = $('#m_maestroProductos #tipo').parents('.form-group');

    select1.hide();
    select2.hide();

    $('#m_maestroProductos select#filtro').change(function(){
        let filtro = $(this).val();
        switch(filtro)
        {
            case 'TODOS':
                select1.hide();
                select2.hide();
            break;
            case 'TIPO':
                select1.hide();
                select2.show();
            break;
            case 'MARCA':
                select1.show();
                select2.hide();
            break;
        }
    });
}

function ingresosProductos()
{
    var fecha_ini = $('#m_ingresosProductos #fecha_ini').parents('.form-group');
    var fecha_fin = $('#m_ingresosProductos #fecha_fin').parents('.form-group');
    var select1 = $('#m_ingresosProductos #producto').parents('.form-group');

    select1.hide();
    fecha_ini.hide();
    fecha_fin.hide();
    $('#m_ingresosProductos select#filtro').change(function(){
        let filtro = $(this).val();
        switch(filtro)
        {
            case 'TODOS':
                select1.hide();
                fecha_ini.hide();
                fecha_fin.hide();
            break;
            case 'FECHA':
                select1.hide();
                fecha_ini.show();
                fecha_fin.show();
            break;
            case 'PRODUCTO':
                select1.show();
                fecha_ini.hide();
                fecha_fin.hide();
            break;
        }
    });
}

function salidasProductos()
{
    var fecha_ini = $('#m_salidasProductos #fecha_ini').parents('.form-group');
    var fecha_fin = $('#m_salidasProductos #fecha_fin').parents('.form-group');
    var select1 = $('#m_salidasProductos #producto').parents('.form-group');

    select1.hide();
    fecha_ini.hide();
    fecha_fin.hide();
    $('#m_salidasProductos select#filtro').change(function(){
        let filtro = $(this).val();
        switch(filtro)
        {
            case 'TODOS':
                select1.hide();
                fecha_ini.hide();
                fecha_fin.hide();
            break;
            case 'FECHA':
                select1.hide();
                fecha_ini.show();
                fecha_fin.show();
            break;
            case 'PRODUCTO':
                select1.show();
                fecha_ini.hide();
                fecha_fin.hide();
            break;
        }
    });
}

function kardexInventario()
{
    // var fecha_ini = $('#m_kardexInventario #fecha_ini').parents('.form-group');
    // var fecha_fin = $('#m_kardexInventario #fecha_fin').parents('.form-group');
    var select1 = $('#m_kardexInventario #producto').parents('.form-group');

    select1.hide();
    $('#m_kardexInventario select#filtro').change(function(){
        let filtro = $(this).val();
        switch(filtro)
        {
            case 'TODOS':
                select1.hide();
            break;
            case 'PRODUCTO':
                select1.show();
            break;
        }
    });
}

function movimientoProductos()
{
    // var fecha_ini = $('#m_movimientoProductos #fecha_ini').parents('.form-group');
    // var fecha_fin = $('#m_movimientoProductos #fecha_fin').parents('.form-group');
    var select1 = $('#m_movimientoProductos #producto').parents('.form-group');

    select1.hide();
    $('#m_movimientoProductos select#filtro').change(function(){
        let filtro = $(this).val();
        switch(filtro)
        {
            case 'TODOS':
                select1.hide();
            break;
            case 'PRODUCTO':
                select1.show();
            break;
        }
    });
}