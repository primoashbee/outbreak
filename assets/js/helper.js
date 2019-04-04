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

function strReverse(string){
    var reversed = ""
    var str = string
    for (var i = str.length - 1; i >= 0; i--) {
        reversed = reversed + str.charAt(i)
    }
    return reversed;
}
function passwordConfirmed(p1,p2){
    if(p1==p2){
        return true;

    }
    return false;
}

function validatePassword($password) {
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    return re.test($password);
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

            if(!validatePassword(p1)){
                alert('Password should have one number, one lowercase and one uppercase letter')
                return;
            }

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

function textAreaAdjust(el) {
    var lines = el.val().split('\n');
    var count = lines.length;
    console.log(count);

}

$(function(){
    setInterval(function(){
        $('#time').html(moment().format('LL - h:mm:ss A'))        
    },1000)
})

function isFutureDate(date){

    var myDate = new Date(date);
    var now = new Date();

    if(myDate > now){
        return true;
    }
        return false;

}


function momentizeDate(date){
    var x = new Date(date)
    return moment(x).fromNow()
}

$(".non-clickable").click(function(e){
    e.preventDefault()
})