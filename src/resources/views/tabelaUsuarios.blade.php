@foreach($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->NOME_COMPLETO }}</td>
        <td>{{ $usuario->LOGIN }}</td>
        <td>{{ $usuario->ATIVO }}</td>
        <td>           
            @if(isset($autorizacoes['exclusao']))
                <button id="delete-button" value="{{ $usuario->USUARIO_ID  }}" class="w3-button w3-theme w3-margin-top"><i class="fas fa-user-times"></i></button>
            @else
                <button class="w3-button w3-theme w3-margin-top" disabled><i class="fas fa-user-times"></i></button>
            @endif

            @if(isset($autorizacoes['edicao']))
                <button id="edit-button" value="{{ $usuario->USUARIO_ID  }}" class="w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
            @else
                <button class="w3-button w3-theme w3-margin-top" disabled ><i class="fas fa-edit"></i></button>
            @endif

        </td>
    </tr>
@endforeach
