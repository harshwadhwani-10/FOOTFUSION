<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php");
}
if(isset($_SESSION['email']))
{
    $email=$_SESSION['email'];
}

if(isset($_POST['newp']) && isset($_POST['confirmp']))
{
    $newp=$_POST['newp'];
    $confirmp=$_POST['confirmp'];

    $servername="localhost";
    $username="root";
    $password="";
    $database="ecomm";

    $conn=new mysqli($servername,$username,$password,$database);
    if($newp!=$confirmp)
    {
        echo<<<_END
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>new and confirm password must be same
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        _END;
    }
    else
    {
        $sql="SELECT * FROM `user` WHERE email='$email'";
        $result1=$conn->query($sql);
        if($result1->num_rows==1)
        {
            $sql1="UPDATE `user` SET pass='$newp' WHERE email='$email'";
            $result2=$conn->query($sql1);
            if($conn->affected_rows>0)
            {
                echo<<<_END
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Your password has been changed successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                _END;
                header("Refresh:10;url=login.php");
            }
            else
            {
                echo<<<_END
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Password not changed due to some error
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                _END;
            }
        }
    }


}

echo<<<_END
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
<body style="background-image: linear-gradient(to left,#008080,#98FB98);">
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
       -webkit-appearance: none;
        margin: 0;
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
    *{
        padding-top:12px;
    }
    .icon{
        padding-left:180px;
    }
    .butt{
        padding-left:180px;
    }
    .checlab{
        display:inline;
    }
</style>
<h1 class="text-center" style="font-family:'Palatino Linotype';">Change Password</h1>
<form action="changepassclick.php" method="post">
    <div class="container col-sm-4 mt-4">
        <div class="card">
            <div class="row">
                <div class="icon">
                    <img src="public/img/change.png" height="130" width="130">
                </div>
                <div class="col-9 ms-5 ps-2">
                    <label>New Password : </label>
                    <input type="password" name="newp" placeholder="enter your new password" class="form-control" required><br>
                </div>
                <div class="col-9 ms-5 ps-2">
                    <label>Confirm Password : </label>
                    <input type="password" name="confirmp" placeholder="reenter your new password" class="form-control" id="passwordInput" required>
                   
                </div>
                <div class="col-1 ic">
                        <a href="#" class="text-dark boricon" id="icon-click" onclick="togglePasswordVisibility()">
                        <i id="eyeIcon" class="fas fa-eye"></i>
                    </a>
                </div>
                <div class="col-7 ms-3 pt-5 butt">
                    <button type="submit" class="form-control" style="background-image: linear-gradient(to left,#90EE90,#87CEFA);">Submit</button><br>
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

</script>
</body>
_END;
   

?>

?>