function check_register()
{
    var username = myform.username.value;
    var psw = myform.password.value;
    var realname = myform.realname.value;
    var passport = myform.passport.value;
    var tele = myform.tele.value;
    var email = myform.email.value;
    if (isUsername(username) == false){
        alert("The username should begin with letter \n" +
        "The length of username should greater or equal to six");
        return false;
    }
    else if (psw == "" || psw.indexOf(" ") >= 0){
        alert("Enter the correct password please");
        return false;
    }
    else if (psw.length < 6){
        alert("The minimum length of password is 6");
        return false;
    }
    else if (isRealname(realname) == false){
        return false;
    }
    else if (passport == "" || passport.indexOf(" ") >= 0){
        alert("Enter the correct passport please");
        return false;
    }
    else if (tele == "" || tele.indexOf(" ") >= 0){
        alert("Enter the telephone number please");
        return false;
    }
    else if (isEmail(email) == false){
        return false;
    }
    else{
        return true;
    }
}
function isUsername(str){
    var reguser = /^[A-Za-z]{1}[A-Za-z0-9]+$/;
    if (reguser.test(str) && str.length >= 6){
        return true;
    }
    else{
        return false;
    }
}

function isRealname(str){
    var regreal = /^([A-Za-z])+ [A-Za-z]+$/;
    if(regreal.test(str)){
        return true;
    }
    else{
        alert("Wrong format of realname \n" + "The correct format is: " + "FirstName Lastname \n" + "Please Fix");
        return false;
    }
}
function isEmail(str){
    var regemail=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
    if(regemail.test(str)){
        return true;
    }
    else{
        alert("Wrong format of email \n" + "The correct format is: " + "xxx@xxx.xxx \n" + "Please Fix");
        return false;
    }
}
function emphasize_func(x){
    x.style.backgroundColor = "#d9d9db";
}
function remove_func(x){
    x.style.backgroundColor = "white";
}
function emphasize_button(x){
    x.style.color = "blue";
}
function remove_button(x){
    x.style.color = "black";
}