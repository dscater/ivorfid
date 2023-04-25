@if(count($tipos) > 0)
@foreach($tipos as $key => $tipo)
<tr>
    <td>{{ $tipo->nom }}</td>
    <td>{{ $tipo->descripcion }}</td>
    <td>
        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('tipos.destroy',$tipo->id) }}" hidden>
        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
        </a>
        <a href="{{ route('tipos.edit',$tipo->id) }}" title="Editar"><i class="material-icons editar">edit</i>
        </a>
        {{-- <a href="{{ route('tipos.show',$tipo->datos_id) }}"><i class="material-icons">visibility</i></a> --}}
    </td>
</tr>
@endforeach
@else
<tr><td colspan="7">No existen registros</td></tr>
@endif