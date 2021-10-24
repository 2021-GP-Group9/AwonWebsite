function validate(form) {
     
 var Email = document.getElementById("email"); 
 var Password = document.getElementById("passwod"); 
 var Name = document.getElementById("name"); 
 var phone = document.getElementById("PhoneNumber");
 
 
  var syn = /[^@]+@[a-zA-Z]+\.[a-zA-Z]{2,6}/;  // to ensure the email input allow only correct address
 

  var digit = /^\d{10}$/ ; //to ensure the phone# input allow only correct address
  
  var passworsChar  = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
  var cheackPass =Password.value.match(passworsChar); 
  
  
  
//1-validate name
        if (Name.value == "" || Name.value == null ) {
            alert("من فضلك ادخل اسم الجمعية");
            Name.focus();
            return false; }

//2-validate phone number
var checkPhone = phone.value.match(digit); // must be numbers

        if (phone.value == "" ) {
            alert("من فضلك ادخل رقم الجمعية");
            phone.focus();
            return false;
        }
if (!checkPhone || phone.value.length <10 || phone.value.length >10)
{
           alert("من فضلك ادخل رقم الجمعية بشكل صحيح");
            phone.focus();
            return false;
        }

 
//3-validate email
var checkEmail = Email.value.match(syn);

        if (Email.value == "") {
           alert( "من فضلك ادخل البريد الإلكتروني");
            Email.focus();
           return false; }
 
if (!checkEmail){
alert( "من فضلك ادخل بريد إلكتروني صالح");
            Email.focus();
            return false;}

//4-validate password
if (Password.value == "") {
           alert( "من فضلك ادخل كلمة المرورة");
            Password.focus();
           return false; }
       
       if(Password.value.length < 8){
           
            alert( "كلمة المرور يجب ان تتكون من ثمان خانات فأكثر ");
            Password.focus();
           return false; }
       
        if(!cheackPass){
        alert("password should contain atleast one number and one special character");
        return false;
    }     
       
        //confirm ("تأكيد معلومات التسجيل");
         if(!confirm("هل أنت متأكد من معلومات التسجيل؟")) {
                  return false;}
              
             // else{
                //return window.location = "index.php";
              //}   

  
             this.form.submit();
 
}


