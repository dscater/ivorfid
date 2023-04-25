<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-blue hover-expand-effect">
            <div class="icon">
                <i class="material-icons">local_offer</i>
            </div>
            <div class="content">
                <div class="text">Productos</div>
                <div class="number count-to" data-from="0" data-to="{{$datos['productos']}}" data-speed="900" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">local_atm</i>
            </div>
            <div class="content">
                <div class="text">Ventas</div>
                <div class="number count-to" data-from="0" data-to="{{$datos['ventas']}}" data-speed="900" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">local_shipping</i>
            </div>
            <div class="content">
                <div class="text">PROVEEDORES</div>
                <div class="number count-to" data-from="0" data-to="{{$datos['proveedores']}}" data-speed="900" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>