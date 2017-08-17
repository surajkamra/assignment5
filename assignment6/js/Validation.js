function validateForm() {
    var name = document.forms["myForm"]["name"].value;
    var email= document.forms["myForm"]["email"].value;
    var number = document.forms["myForm"]["cellno"].value;
    var password=document.forms["myForm"]["password"].value;
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    var numbers = /^[0-9]+$/;  
    var patt1=/^[A-Z][a-z 0-9 @$%#~?><>]/;

    if (name== "") {
        alert("Name must be filled out");
        return false;
       }
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        alert("Not a valid e-mail address");
        return false;
    }
    if(number.match(numbers)){

    }
    else
    {
    	alert("Mobile number should contains only numbers");
    }
    if(password.match(patt1))
    {
       
    }
    else
    {
    	alert("Password format is incorrect");
    }
   
      

}

