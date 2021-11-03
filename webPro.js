
                                function validate() {

                                    var phone = document.getElementById("phone_number").value;
                                    var digit = /^\d{10}$/; //to ensure the phone# input allow only correct address
                                    //1-validate phone number
                                    var checkPhone = phone.match(digit); // must be numbers
                                    if (!checkPhone || phone.length < 10 || phone.length > 10)
                                    {
                                        alert("من فضلك ادخل رقم الجمعية بشكل صحيح");
                                        phone.focus();
                                        return false;
                                    }


                                    var Password = document.getElementById("password").value;
                                    var passworsChar = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
                                    var cheackPass = Password.match(passworsChar);
                                    //2-validate password

                                    if (Password.value.length < 8) {

                                        alert("كلمة المرور يجب ان تتكون من ثمان خانات فأكثر ");
                                        Password.focus();
                                        return false;
                                    }

                                if (!cheackPass) {
                                    alert("password should contain atleast one number and one special character");
                                    return false;
                                }
 if(!confirm("هل أنت متأكد من معلومات التسجيل؟")) {
                  return false;}
              
//              else{
//                  return window.location = "confirmationPage.php";
//              }   
                                }
