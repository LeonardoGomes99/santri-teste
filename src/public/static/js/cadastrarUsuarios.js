$(document).ready(function(){        

    $('#form-submit').click(function(e) {            
        storeUsuario(e);
    });

    $('#form-ativo').blur(function() {
        var val = this.value.toUpperCase();
        if(val != "S" && val != "N") {
            this.value = '';
            alert( "'Apenas S ou N. \n Digite Novamente.");
            return;
        }
        this.value = val;
    });


    function storeUsuario(e){

        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/usuario/store",
            data: {
                USUARIO_ID : e.target.name ,
                NOME_COMPLETO : $('#form-nome').val(),
                LOGIN : $('#form-login').val(),
                ATIVO : $('#form-ativo').val(),
                SENHA : $('#form-senha').val(),
                AUTHS : {
                   criar : $('#opt_cadastrar_clientes').is(":checked") ? 'cadastrar_clientes' : 0,
                   editar : $('#opt_editar_clientes').is(":checked") ? 'editar_clientes' : 0,
                   excluir : $('#opt_excluir_clientes').is(":checked") ? 'excluir_clientes' : 0,
                }
        
            },beforeSend: () =>{
                swal.showLoading();
            },        
            success: function(res) {                  
                swal.close();                     
                window.location=res.url                                                       
            },
            error: function(res) { 
                swal.close();
                swal.fire('Erro não foi possível cadastrar o usuário')
            }   
        });
    }
});