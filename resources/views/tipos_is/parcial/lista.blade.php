@if(count($tipos_is) > 0)
@foreach($tipos_is as $key => $tipo)
<tr>
    <td>{{ $tipo->nom }}</td>
    <td>{{ $tipo->descripcion }}</td>
    <td>
        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('tipos_is.destroy',$tipo->id) }}" hidden>
        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
        </a>
        <a href="{{ route('tipos_is.edit',$tipo->id) }}" title="Editar"><i class="material-icons editar">edit</i>
        </a>
        {{-- <a href="{{ route('tipos_is.show',$tipo->datos_id) }}"><i class="material-icons">visibility</i></a> --}}
    </td>
</tr>
@endforeach
@else
<tr><td colspan="3">No existen registros</td></tr>
@endif