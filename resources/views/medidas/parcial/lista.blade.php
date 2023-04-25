@if(count($medidas) > 0)
@foreach($medidas as $key => $medida)
<tr>
    <td>{{ $medida->nom }}</td>
    <td>{{ $medida->simbolo }}</td>
    <td>{{ $medida->descripcion }}</td>
    <td>
        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('medidas.destroy',$medida->id) }}" hidden>
        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
        </a>
        <a href="{{ route('medidas.edit',$medida->id) }}" title="Editar"><i class="material-icons editar">edit</i>
        </a>
        {{-- <a href="{{ route('medidas.show',$medida->datos_id) }}"><i class="material-icons">visibility</i></a> --}}
    </td>
</tr>
@endforeach
@else
<tr><td colspan="7">No existen registros</td></tr>
@endif