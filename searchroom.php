<!DOCTYPE html>
<head>
	<title> Search Room </title>
	<meta charset = "utf-8"/>
    <link rel = "Stylesheet" type = "text/css" href = "select_room.css">
    <script type = "text/javascript" src = "emphasize.js"></script>
    <script>
	    function check(){
		    var regnum = /^[0-9]{3,4}$/;
		    var num = myform.roomNo.value;
		    if (regnum.test(num)){
			    return true;
		    }
		    else{
			    alert("The room number should be digit \n" +
			    "Enter 3 or 4 digit room number");
			    return false;
		    }
	    	}
    </script>
</head>
<body>
<div class = "box">
	<div class = "box-logo">
		<h2> Search Room No </h2>
	</div>
	<form action = 'search.php' method = "GET" name = "myform" onsubmit = "return check();">
	<div class = "form-item">
        <input type = "text" name = "roomNo" placeholder = "Enter the room number">
	</div>
	<div class = "form-button">
        <input onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)" type = "submit" value = "SEARCH">
	</div>
        <a class = "GoBack" href = "staffpage.php">BACK</a>
</div>
</body>
</html>