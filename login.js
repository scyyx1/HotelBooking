function check()
{
    if (myform.username.value == "" || myform.username.value.indexOf(" ") >= 0){
        alert("Enter the correct username please");
        return false;
    }
    else if (myform.password.value == "" || myform.password.value.indexOf(" ") >= 0){
        alert("Enter the correct password please");
        return false;
    }
    else {
        return true;
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