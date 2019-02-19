function ifHasPassword(p1,p2){
    var ctr= 0;
    if(p1!=""){
        ctr++;
    }
    if(p1!=""){
        ctr++;
    }

    if(ctr==0){
        return false;
    }
    return true;

}

function passwordConfirmed(p1,p2){
    if(p1==p2){
        return true;

    }
    return false;
}


$('.changePassword').click(function(){
    $('#changePassModal').modal('show')
})

$('#btnChangePass').click(function(){
    var p1 = $('#password').val()
    var p2 = $('#password_confirmation').val()

    if(ifHasPassword(p1,p2)){
        if(passwordConfirmed(p1,p2)){
            var id = $('#changepass_id').val()
            $.ajax({
                url:'ajax.php',
                data: {type:'change_password_via_id',id:id,password:p1},
                dataType: 'JSON',
                type: 'POST',
                success: function(data){
                    if(data.isSuccess){
                        alert('Password Successfuly Changed')
                        location.reload()
                    }
                }
            })
            return;
        }
        alert("pass not same")
        return;
    }
    alert('fill up fields')
    return;
})