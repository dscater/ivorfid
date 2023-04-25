@if(count($ventas) > 0)
@foreach($ventas as $key => $venta)
<tr>
    <td>{{ $key = $key + 1 }}</td>
    <td>{{ $venta->pago_total }}</td>
    <td>{{ $venta->fecha }}</td>
    <td>{{ $venta->num_factura }}</td>
    @if($venta->user->datosUsuario)
    <td>{{ $venta->user->datosUsuario->nom_u }} {{ $venta->user->datosUsuario->apep_u }} {{ $venta->user->datosUsuario->apem_u }}
    </td>
    @else
    <td>
        {{ $venta->user->name }}
    </td>
    @endif
    <td>
        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('ventas.destroy',$venta->id) }}" hidden>
        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
        </a>
        <a href="{{ route('ventas.edit',$venta->id) }}" title="Editar"><i class="material-icons editar">edit</i>
        </a>
        {{-- <a href="{{ route('ventas.show',$venta->datos_id) }}"><i class="material-icons">visibility</i></a> --}}
    </td>
</tr>
@endforeach
@else
<tr><td colspan="6">No existen registros</td></tr>
@endif