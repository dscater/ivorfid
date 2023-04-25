@if(count($productos) > 0)
@foreach($productos as $key => $producto)
@php
    $cant_actual = $producto->cant_actual;
    $cant_min = $producto->cant_min;
    $clase = "normal";
    if($cant_actual < $cant_min)
    {
        $clase = "por_debajo";
    }
    elseif ($cant_actual < $cant_min + 5) {
        $clase = "bajo_stock";
    }
@endphp
<tr class="{{$clase}}">
    <td>{{ $producto->cod }}</td>
    <td>{{ $producto->rfid }}</td>
    <td>{{ $producto->nom }}</td>
    <td>{{ $producto->precio }}</td>
    <td><img src="{{ asset('imgs/productos/'.$producto->imagen) }}" width="75" height="75"></td>
    <td>{{ $producto->tipo }}</td>
    <td>{{ $producto->marca }}</td>
    <td>{{ $producto->medida }}</td>
    <td>{{ $producto->cant_actual }}</td>
    <td>{{ $producto->razon_social_p }}</td>
    <td>
        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('productos.destroy',$producto->id) }}" hidden>
        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
        </a>
        <a href="{{ route('productos.edit',$producto->id) }}" title="Editar"><i class="material-icons editar">edit</i>
        </a>
        {{-- <a href="{{ route('productos.show',$producto->datos_id) }}"><i class="material-icons">visibility</i></a> --}}
    </td>
</tr>
@endforeach
@else
<tr><td colspan="11">No existen registros</td></tr>
@endif