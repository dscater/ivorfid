@if(count($descuentos) > 0)
@foreach($descuentos as $key => $descuento)
<tr>
    <td>{{ $descuento->descuento }}</td>
    <td>{{ $descuento->simbolo }}</td>
    <td>{{ $descuento->descripcion }}</td>
    <td>
        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('descuentos.destroy',$descuento->id) }}" hidden>
        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
        </a>
        <a href="{{ route('descuentos.edit',$descuento->id) }}" title="Editar"><i class="material-icons editar">edit</i>
        </a>
        {{-- <a href="{{ route('descuentos.show',$descuento->datos_id) }}"><i class="material-icons">visibility</i></a> --}}
    </td>
</tr>
@endforeach
@else
<tr><td colspan="7">No existen registros</td></tr>
@endif