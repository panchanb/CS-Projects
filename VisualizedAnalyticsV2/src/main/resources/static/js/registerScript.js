
function passwordValidator(){
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;

    var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,3})+$/;
    var password_pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

    if(name != '' && email != '' && pass1 != '' && pass2 != ''){
        if(email.match(email_pattern)){
            if(pass1 == pass2){
                if(pass1.match(password_pattern) && pass2.match(password_pattern)){
                    window.location = 'markets.html';
                }
                else{
                    alert('(1) Email is validated! \n(2) Both the passwords matched! \n\nERROR: Password should contain atleast one Uppercase letter, one Lowercase letter, one number and minimum of 8 characters');
                }
            }
            else{
                alert('(1) Email is validated! \nERROR: Passwords do not match!')
            }
        }
        else{
            alert('Please enter a valid email');
        }
    }
    else{
        alert('Please fill out all the fields');
    }
}
