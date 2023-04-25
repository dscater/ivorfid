@if(count($marcas) > 0)
@foreach($marcas as $key => $marca)
<tr>
    <td>{{ $marca->nom }}</td>
    <td>{{ $marca->descripcion }}</td>
    <td>
        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('marcas.destroy',$marca->id) }}" hidden>
        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
        </a>
        <a href="{{ route('marcas.edit',$marca->id) }}" title="Editar"><i class="material-icons editar">edit</i>
        </a>
        {{-- <a href="{{ route('marcas.show',$marca->datos_id) }}"><i class="material-icons">visibility</i></a> --}}
    </td>
</tr>
@endforeach
@else
<tr><td colspan="7">No existen registros</td></tr>
@endif