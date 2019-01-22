function ifHasPassword(p1,p2){
    var ctr= 0;
    if(p1!=""){
        ctr++;
    }
    if(p1!="")
        ctr++;

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