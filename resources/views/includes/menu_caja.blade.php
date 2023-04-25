<li class="{{request()->is('home')? 'active':''}}">
    <a href="{{route('home')}}">
        <i class="material-icons">home</i>
        <span>Inicio</span>
    </a>
</li>
<li class="{{request()->is('productos/ventas/create')? 'active':''}}">
    <a href="{{route('ventas.create')}}">
        <i class="material-icons">local_atm</i>
        <span>Realizar venta</span>
    </a>
</li>
<li class="{{request()->is('productos*')? 'active':''}}">
    <a href="{{route('productos.index')}}">
        <i class="material-icons">local_offer</i>
        <span>Productos</span>
    </a>
</li>