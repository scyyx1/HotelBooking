function check()
{
    if (myform.startdate.value == ""){
        alert("Enter the check-in date please");
        return false;
    }
    else if (myform.enddate.value == ""){
        alert("Enter the check-out date please");
        return false;
    }
    else {
        var date1 = myform.startdate.value;
        var date2 = myform.enddate.value;
        if (isDate(date1) == false){
            alert("The check-in date format is wrong");
            return false;
        }
        if (isDate(date2) == false){
            alert("The check-out date format is wrong");
            return false;
        }
        var date = new Date();
        var year = date.getFullYear();
        var month = date.getMonth()+1;
        var date = date.getDate();
        if (month >= 1 && month <= 9){
            month = "0" + month;
        }
        if (date >= 0 && date <= 9){
            date = "0" + date;
        }
        var todayDate = year + "-" + month + "-" + date;
        if(date1 < todayDate){
            alert("Wrong input of check-in date");
            return false;
        }
        if(date2 <= todayDate){
            alert("Wrong input of check-out date");
            return false;
        }
        if (date1 >= date2){
            alert("The check-out date should later than check-in date");
            return false;
        }
        else{
            return true;
        }
    }
}
function isDate(str){
    var regdate = /^[1-2]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
    if (regdate.test(str)){
        return true;
    }
    else{
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
