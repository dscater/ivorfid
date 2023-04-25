@if(count($proveedores) > 0)
@foreach($proveedores as $key => $proveedor)
<tr>
    <td>{{ $proveedor->razon_social_p }}</td>
    <td>{{ $proveedor->fono_p }}</td>
    <td><img src="{{ asset('imgs/proveedores/'.$proveedor->logo_p) }}" width="75" height="75"></td>
    <td>{{ $proveedor->nom_rep_p }} {{ $proveedor->apep_rep_p }} {{ $proveedor->apem_rep_p }}</td>
    <td>{{ $proveedor->cel_rep_p }}</td>
    <td>
        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('proveedores.destroy',$proveedor->id) }}" hidden>
        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
        </a>
        <a href="{{ route('proveedores.edit',$proveedor->id) }}" title="Editar"><i class="material-icons editar">edit</i>
        </a>
        {{-- <a href="{{ route('proveedores.show',$proveedor->datos_id) }}"><i class="material-icons">visibility</i></a> --}}
    </td>
</tr>
@endforeach
@else
<tr><td colspan="7">No existen registros</td></tr>
@endif