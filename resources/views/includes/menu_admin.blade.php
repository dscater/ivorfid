<li class="{{request()->is('home')? 'active':''}}">
    <a href="{{route('home')}}">
        <i class="material-icons">home</i>
        <span>Inicio</span>
    </a>
</li>
<li class="{{request()->is('users*')? 'active':''}}">
    <a href="{{route('users.index')}}">
        <i class="material-icons">people</i>
        <span>Usuarios</span>
    </a>
</li>
<li class="{{request()->is('proveedores*')? 'active':''}}">
    <a href="{{route('proveedores.index')}}">
        <i class="material-icons">local_shipping</i>
        <span>Proveedores</span>
    </a>
</li>
<li class="{{request()->is('productos*')? 'active':''}}">
    <a href="{{route('productos.index')}}">
        <i class="material-icons">local_offer</i>
        <span>Productos</span>
    </a>
</li>
<li class="{{request()->is('tipos*')? 'active':''}}">
    <a href="{{route('tipos.index')}}">
        <i class="material-icons">view_list</i>
        <span>Tipos</span>
    </a>
</li>
<li class="{{request()->is('marcas*')? 'active':''}}">
    <a href="{{route('marcas.index')}}">
        <i class="material-icons">bookmark</i>
        <span>Marcas</span>
    </a>
</li>
<li class="{{request()->is('medidas*')? 'active':''}}">
    <a href="{{route('medidas.index')}}">
        <i class="material-icons">list</i>
        <span>Medidas</span>
    </a>
</li>
<li class="{{request()->is('descuentos*')? 'active':''}}">
    <a href="{{route('descuentos.index')}}">
        <i class="material-icons">arrow_downward</i>
        <span>Descuentos</span>
    </a>
</li>
<li class="{{request()->is('reportes*')? 'active':''}}">
    <a href="{{route('reportes.index')}}">
        <i class="material-icons">assessment</i>
        <span>Reportes</span>
    </a>
</li>