@if(count($usuarios) > 0)
@foreach($usuarios as $key => $user)
<tr>
    <td>{{ $user->codigo }}</td>
    <td>{{ $user->nombre }}</td>
    <td>{{ $user->ci }}</td>
    <td>{{ $user->fono_u }}/{{ $user->cel_u }}</td>
    <td>{{ $user->tipo }}</td>
    <td><img src="{{ asset('imgs/personal/'.$user->foto_u) }}" width="75" height="75"></td>
    <td>
        <input type="text" name="eliminar" class="url_eliminar" value="{{ route('users.destroy',$user->user_id) }}" hidden>
        <a href="#" title="Eliminar" class="eliminar"><i class="material-icons eliminar">delete</i>
        </a>
        <a href="{{ route('users.edit',$user->datos_id) }}" title="Editar"><i class="material-icons editar">edit</i>
        </a>
        {{-- <a href="{{ route('users.show',$user->datos_id) }}"><i class="material-icons">visibility</i></a> --}}
    </td>
</tr>
@endforeach
@else
<tr><td colspan="7">No existen registros</td></tr>
@endif