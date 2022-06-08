$(document).ready(function(){        
    $( " button[id='form-submit'] " ).click(function() {
        const values = getValues();
        login(values);
    });

    function getValues(){
        const data = [];
        data['LOGIN'] = ($('#form-login').val());
        data['SENHA'] = ($('#form-password').val());
        return data;
    }

    function login(values){
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/auth/login",
            data: {
               LOGIN : values.LOGIN,
               SENHA : values.SENHA
            },
            beforeSend: () =>{
                swal.showLoading();
            },
            success: function(res) {
                swal.close()
                window.location=res.url           
            },
            error: function(res) { 
                swal.close()
                swal.fire('Login Incorreto!')
            }   
        });
    }    
});