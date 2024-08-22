<?php
session_start();
$otp=rand(1111,9999);
$_SESSION['otp']=$otp;
if(isset($_POST['email']))
{
    $email=$_POST['email'];
    $_SESSION['email']=$email;
    $servername="localhost";
    $username="root";
    $password="";
    $database="ecomm";
    $conn=new mysqli($servername,$username,$password,$database);
    $sql="SELECT * FROM `user` WHERE email='$email'";
    $result1=$conn->query($sql);
    if($result1->num_rows==1)
    {
        $currentDateTime = time();
        echo $currentDateTime;
        $_SESSION['currentDateTime']=$currentDateTime;
        header("Refresh:10;url=otp.php");
    }
    else
    {
        echo<<<_END
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Wrong Email address! Please try again
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        _END;
    }
}

echo<<<_END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Forgot Password</title>
    <style>
    body{
        background-color: #f8f9fa;
        height: 100vh;
        align-items: center;
        justify-content: center;
        background-image:  linear-gradient(to left,#B0E0E6,#66CDAA);
        border-radius:20px;
    }
    .butt{
        padding-left:80px;
    }
    .pad{
        padding-top:70px;
    }
    .icon{
        padding-top:20px;
        padding-left:150px;
    }
    .instr{
        text-align:center;
        padding-top:30px;
        font-family:'Times New Roman';
    }
</style>
</head>
<body>
<form action="forgotpass.php" method="post">
    <div class="container col-lg-4 mt-4 mx-auto pad">
        <div class="card">
            <div class="row">
                <div class="icon">
                    <img src="public/img/fogot.jpeg" height="130" width="130">
                </div>
                <div class="instr">
                    You can change your password by entering the email and <br>we'll send you a OTP through which you can <br>change your password
                </div>
                <div class="input-group col-4 px-5 mt-5">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                  </svg></span>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInputGroup1" placeholder="Email" name="email">
                        <label for="floatingInputGroup1">Email</label>
                    </div>
                </div>
                <input type="hidden" name="otp" value="<?php echo $otp;?>">
                <div class="col-8 ms-5 mt-3 pt-4 butt">
                    <button type="submit" class="form-control" style="background-image: linear-gradient(to left,#90EE90,#87CEFA);">GET OTP</button><br>
                </div>
            </div>
         </div>
    </div>
</form>
</body>
</html>
_END;

?>