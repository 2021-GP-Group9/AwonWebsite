/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


       function validate() {
     
 var Email = document.getElementById("email"); 
 var Password = document.getElementById("password"); 
 var Name = document.getElementById("name"); 
 var phone = document.getElementById("phone");
 
 
  var syn = /[^@]+@[a-zA-Z]+\.[a-zA-Z]{2,6}/;  // to ensure the email input allow only correct address
  //validate input email
  
  var letters = /^[a-zA-Z]+$/;     // to ensure the name input allow to string only

  var digit = /^\d{10}$/ ; //to ensure the phone# input allow only correct address
  
  
  
//1-validate name

var checkName = Name.value.match(letters);

        if (Name.value == "") {
            alert("من فضلك ادخل اسم الجمعية");
            Name.focus();
            return false; }

if (!checkName){
alert("من فضلك ادخل اسم صحيح");
            Name.focus();
            return false;}
        
//2-validate phone number

var checkPhone = phone.value.match(digit);

        if (phone.value == "") {
            alert("من فضلك ادخل رقم الجمعية");
            phone.focus();
            return false;
        }
if (!checkPhone)
{
           alert("من فضلك ادخل رقم صحيح");
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
       
       
       
     window.location = "RequestToJoin.php";
 
}