<?php


if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['gender']) && isset($_POST['pass']) && isset($_POST['add']) && isset($_POST['city']) && isset($_POST['pin']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $pass=$_POST['pass'];
    $add=$_POST['add'];
    $pin=$_POST['pin'];
    $city=$_POST['city'];
    

    
    $servername="localhost";
    $username="root";
    $password="";
    $database="ecomm";

    $conn=new mysqli($servername,$username,$password,$database);
    $sql="SELECT * FROM `user` WHERE phone='$phone' OR email='$email'"; 
    $result1=$conn->query($sql);
    function hash_password($password) {
        // Generate a hash using bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        return $hashed_password;
    }
    
    $hashed_password = hash_password($pass);   
    if($result1->num_rows>0)
    {
        echo<<<_END
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>You are already registered.You can Log in to our website
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        _END;
        header("Refresh:3;url=login.php");
    }
    else
    {
        $sql1="INSERT INTO `user`(`fname`,`lname`, `email`, `phone`,`gender`,`address`,`pin`,`pass`, `city`) VALUES ('$fname','$lname','$email','$phone','$gender','$add','$pin','$hashed_password','$city')";
        $result2=$conn->query($sql1);
        if($result2)
        {
            echo<<<_END
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Your Registration is successful
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            _END;
        }
    }
   
}
    
echo<<<_END
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
       -webkit-appearance: none;
        margin: 0;
}

input[type=number] {
    -moz-appearance: textfield;
}
.texsignup{
    text-align:center;
    font-size:20px;
}
.siginlink{
    text-decoration:none;
    color:teal;
}
body{
    background-image: url('public/img/register.jpeg');
    background-size: 1000px 1000px;
}
.boricon{
    width:30px;
    height:30px;
    border-radius:2px;
    margin-left:-55px;
}
.ic{
    padding-top:50px;
}
.validation-dropdown {
    position: absolute;
    margin-top: 5px;
    background-color: #fff;
    border: 1px solid skyblue;
    border-radius: 4px;
    max-height: 100px;
    overflow-y: auto;
    z-index: 1000;
  }
  .validation-message {
    padding: 8px;
    color:red;
  }
</style>
<body>

<form action="register.php" method="post" onsubmit="return validateForm()">
<div class="container col-lg-8 mt-4">
<div class="card">
<div class="row gx-3">
    <h1 class="text-center" style="font-family:'Palatino Linotype'; color:teal">Registration Form</h1>
                 <div class="col-5 ms-5 mt-3 ps-3">
                    <label>First Name: </label>
                    <input type="text" name="fname" placeholder="Enter your first name" class="form-control" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                </div>
                <div class="col-5 mt-3">
                    <label>Last Name: </label>
                    <input type="text" name="lname" placeholder="Enter your last name" class="form-control" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                </div>

           
                <div class="col-10 ms-5 mt-3 ps-3">
                    <label>Email: </label>
                    <input type="email" name="email" placeholder="Enter your email ID" class="form-control" required><br>
                </div>

                <div class="col-10 ms-5 mt-3 ps-3">
                    <label>Phone : </label>
                    <input type="tel" name="phone" placeholder="Enter your phone number" class="form-control" pattern="[0-9]{10}" title="(Please enter only 10 numbers)" required><br>
                </div>
                <div class="col-5 ms-5 mt-3 ps-3">
                <label>Gender: </label>
                <select name="gender" class="form-select" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
            </div>
            <div class="col-5 mt-3 position-relative" >
            <label>Password : </label>
            <input type="password" name="pass" placeholder="Enter your password" class="form-control" id="passwordInput" oninput="validatePassword(this.value)" required>
            <div id="validationDropdown" class="validation-dropdown" style="display: none;"></div>
          </div>
          <div class="col-1 ic">
            <a href="#" class="text-dark boricon" id="icon-click" onclick="togglePasswordVisibility()">
              <i id="eyeIcon" class="fas fa-eye"></i>
            </a>
          </div>
                <div class="col-10 ms-5 mt-3 ps-3">
                    <label>Address : </label>
                    <input type="text" name="add" placeholder="Enter your Address" class="form-control" required><br>
                </div>
                <div class="col-5 ms-5 mt-3 ps-3">
                    <label>City : </label>
                    <input list="city" name="city" placeholder="Enter your city" class="form-control" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required><br>
                    <datalist id="city">
                        <option value="Mumbai"></option>
                        <option value="Ahmedabad"></option>
                        <option value="Delhi"></option>
                        <option value="Jaipur"></option>
                        <option value="Anand"></option>
                        <option value="Ujjain"></option>
                    </datalist>
                </div>
                <div class="col-5 mt-3">
                    <label>Pin Code : </label>
                    <input type="text" name="pin" placeholder="Enter your pincode" class="form-control" pattern="[0-9]{6}" title="Please enter a 6-digit pin code" required>
                </div>

                <div class="col-3 mx-auto">
                    <br><button type="submit" class="form-control" style="background-image: linear-gradient(to left,#90EE90,#87CEFA);">Submit</button><br>
                </div>
                <div class="texsignup pb-4">
                    <div>Have already an account? <a href="login.php" class="siginlink">sign in</a></div>
                </div>
            </div>
         </div>
    </div>
</form>
<script>
function togglePasswordVisibility() {
        var passwordInput = document.getElementById('passwordInput');
        var eyeIcon = document.getElementById('eyeIcon');
      
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          eyeIcon.classList.remove('fa-eye');
          eyeIcon.classList.add('fa-eye-slash');
        } else {
          passwordInput.type = 'password';
          eyeIcon.classList.remove('fa-eye-slash');
          eyeIcon.classList.add('fa-eye');
        }
    }
    let isPasswordValid = false;
    function validatePassword(password) {
        const hasUpperCase = /[A-Z]/.test(password);
        const hasNumber = /\d/.test(password);
        const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
        let message = '';
        
        const validationDropdown = document.getElementById('validationDropdown');
    
        if (hasUpperCase && hasNumber && hasSpecialChar) {
          validationDropdown.style.display = 'none';
          isPasswordValid = true;
        } else {
            validationDropdown.innerHTML = `<div class="validation-message">Password must contain at least one uppercase letter, one number, and one special character</div>`;
            validationDropdown.style.display = 'block';
            isPasswordValid = false;
        }
      }
      function validateForm() {
        return isPasswordValid;
      }
    
</script>
</body>
_END;
   

?>


<!-- <div class="col-2 mt-5 ps-1 boricon">
                    <a href="#" class="text-dark" id="icon-click">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" id="eyeicon" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"  onclick="togglePasswordVisibility()">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                    </a>
                </div> -->