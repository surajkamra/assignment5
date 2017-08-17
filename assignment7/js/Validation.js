function Validate() {
    var locality = document.forms["myForm"]["locality"].value;
    var sublocality= document.forms["myForm"]["sublocality"].value;
    var mobile = document.forms["myForm"]["mobile"].value;
    var city=document.forms["myForm"]["city"].value;
   
    var numbers = /^[0-9]+$/;  
    var patt1=/^[A-Z][a-z 0-9 @$%#~?><>]/;

    if (locality== "") {
        alert("textfield be filled out");
        return false;
       }
    if (sublocality== "") {
        alert("sublocality must be filled out");
        return false;
       }   
   
    if(number.match(numbers)){

    }
    else
    {
        alert("Mobile number should contains only numbers");
        return false;
    }
    if (street== "") {
        alert("street must be filled out");
        return false;
    } 
    if (city== "") {
        alert("city must be filled out");
        return false;
     }
     if (country== "") {
        alert("country must be filled out");
        return false;
       }
    
   
      

}

