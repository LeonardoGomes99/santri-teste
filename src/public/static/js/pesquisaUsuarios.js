$(document).ready(function(){        
    
    getAllUsuarios();

    $('#search-button').click(function() {    
        $('#lista_usuarios tbody').empty();    
        getUsuario();
    });

    $('body').on("click", "#delete-button", function(){
        Swal.fire({
            title: 'Tem certeza que deseja excluir este usuário?',
            text: "Não poderá reverter as mudanças se confirmar !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, excluir usuário',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              deleteUsuario($(this).val());              
            }
          })
    });

    $(document).on("blur", "#form-ativo", function(){
        var val = this.value.toUpperCase();
        if(val != "S" && val != "N") {
            this.value = '';
            alert( "'Apenas S ou N. \n Digite Novamente.");
            return;
        }
        this.value = val;
    });

    $(document).on("click", "#form-submit", function(){
        update($(this).attr('name'));
    });

    $('body').on("click", "#edit-button", function(){
        getUsuarioById($(this).val());              
    });


    function getAllUsuarios(){
        $('#lista_usuarios tbody').empty(); 
        $.ajax({
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/usuario/all", 
            beforeSend: () =>{
                swal.showLoading();
            },       
            success: function(res) {              
                $('#lista_usuarios tbody').append(res);    
                swal.close();     
            },
            error: function(res) { 
                swal.close();
                swal.fire('Erro não foi possível encontrar o usuário')
            }   
        });
    }    

    function getUsuario(){
        $.ajax({
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/usuario/find",
            data: {
                NOME_COMPLETO: $('#search-nome').val()
            },beforeSend: () =>{
                swal.showLoading();
            },        
            success: function(res) {                  
                $('#lista_usuarios tbody').append(res); 
                swal.close();    
                                             
            },
            error: function(res) { 
                swal.close();
                swal.fire('Erro não foi possível encontrar o usuário')
            }   
        });
    }

    function deleteUsuario(id){
        $.ajax({
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/usuario/"+id,
            beforeSend: () =>{
                swal.showLoading();
            },        
            success: function(res) {                  
                swal.close();    
                Swal.fire(
                    'Excluído!',
                    'Seu usuário foi excluído.',
                    'success'
                )
                getAllUsuarios();                                                             
            },
            error: function(res) { 
                swal.close();
                swal.fire('Erro não foi possível excluir o usuário')
                getAllUsuarios();                                                             
            }   
        });
    }

    function getUsuarioById(id){
        $.ajax({
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "usuario/find/"+id,
            beforeSend: () =>{
                swal.showLoading();
            },        
            success: function(res) {                  
                swal.close();    
                editUsuario(res);                
            },
            error: function(res) { 
                swal.close();
                swal.fire('Erro não foi possível localizar o usuário')
                getAllUsuarios();                                                             
            },
            async: true  
        });
    }

    function editUsuario(html){
        Swal.fire({
            title: '',        
            html:html,
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            showCancelButton: false,
            showConfirmButton: false            
        });          
    }

    function update(id){
        $.ajax({
            type: "PUT",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                USUARIO_ID : id ,
                NOME_COMPLETO : $('#form-nome').val(),
                LOGIN : $('#form-login').val(),
                ATIVO : $('#form-ativo').val(),
                SENHA : $('#form-senha').val(),
                AUTHS : {
                   criar : $('#opt_cadastrar_clientes').is(":checked") ? 'cadastrar_clientes' : 0,
                   editar : $('#opt_editar_clientes').is(":checked") ? 'editar_clientes' : 0,
                   excluir : $('#opt_excluir_clientes').is(":checked") ? 'excluir_clientes' : 0,
                }
            },
            url: "/usuario/update",
            beforeSend: () =>{
                swal.showLoading();
            },        
            success: function(res) {              
                swal.close();    
                Swal.fire(
                    'Alterado!',
                    'Seu usuário foi alterado.',
                    'success'
                )
                getAllUsuarios();                                                                                                                                
            },
            error: function(res) {   
                swal.close();
                swal.fire('Erro não foi possível alterar o usuário')
                getAllUsuarios();                                                             
            },   
            async: true
        });
    }
    
});