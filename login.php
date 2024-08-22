<?php

$userID="";
// Check if the user has a login cookie
// if (isset($_COOKIE['userID'])) {
//     $userID = $_COOKIE['userID'];
//     echo "Welcome back, User $userID!";
// }


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $entered_password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ecomm";

    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "SELECT * FROM `user` WHERE email='$email'";
    $result1 = $conn->query($sql);

    if ($result1->num_rows == 1) {
        $row = $result1->fetch_assoc();

        $stored_hashed_password = $row['pass'];

        // Verify the entered password with the stored hashed password
        if (password_verify($entered_password, $stored_hashed_password)) {
            // Password is correct
            $userID = $row['userID'];

            if ($email != 'admin890@gmail.com') {
                setcookie('userID', $userID, time() + 3600, '/');
                // echo "Welcome, User $userID!";
                $_COOKIE['userID'] = $userID;
                echo<<<_END
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Your Login is successful
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                _END;
            }

            if ($email == 'admin890@gmail.com') {
                setcookie('userID', $userID, time() + 3600, '/');
                // echo "Welcome, User $userID!";
                $_COOKIE['userID'] = $userID;
                echo<<<_END
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Your Login is successful
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                _END;
                header("Refresh:2;url=adminpanel.php");
            } else {
                header("Refresh:2;url=index.php");
            }
        } else {
            // Incorrect password

            echo<<<_END
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Wrong Username or Password! Please try again
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            _END;

        }
    } else {
        // User not found

        echo<<<_END
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Wrong Username or Password! Please try again
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
    <title>Login</title>
    <style>
    body {
        height: 90vh;
        align-items: center;
        justify-content: center;
        background-image: url('public/img/loginfinal.png');
        border-radius: 20px;
        background-repeat: no-repeat;
        background-size: 100%;
        width: 100vw;
        object-fit: cover;
        background-position: center;
        margin: 0; 
    }

    .link-forgot {
        text-decoration: none;
        text-align: right;
        padding-right: 50px;
        color: blue;
    }

    .butt {
        padding-left: 80px;
    }

    .signupbutt {
        padding-left: 20px;
        text-decoration: none;
        color: blue;
    }

    .pad {
        padding-top: 70px;
    }

    .logimg {
        width: 100%; /* Set width to 100% for responsiveness */
        height: auto; /* Set height to auto for responsiveness */
        max-width: 300px; /* Set a max-width for the image */
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .card {
        --bs-card-bg: #0000005e;
    }
    /* Updated styles for responsiveness */
    @media (max-width: 576px) {
        .pad {
            padding-top: 0;
        }

        .butt {
            padding-left: 20px;
        }
        body {
            background-size: cover; /* Adjust background size for mobile */
            padding-bottom:0;
        }
        .container {
            max-width: 100%; 
            max-height:100%;
        }
    }
    @media (min-width: 768px) and (max-width: 1024px) {
        /* Add your styles for iPad Mini here */
        body {
            /* Example: Adjust background size for iPad Mini */
            background-size: cover;
        }
        
        .container {
            /* Example: Adjust container styles for iPad Mini */
            max-width: 500px;
        }
    }
    @media (min-width: 582px) and (max-width: 763px) {
        body {
            /* Example: Adjust background size for screens between 582px and 763px */
            background-size: cover;
        }
    
        .container {
            /* Example: Adjust container styles for screens between 582px and 763px */
            max-width: 400px;
        }
    }
    
</style>
</head>
<body class="img-fluid">
<form action="login.php" method="post">
    <div class="container col-lg-5 mt-4 mx-auto pad">
        <div class="card">
            <div class="row">
               <img src="public/img/logo1.png" class="logimg img-fluid"></img>
                <div class="input-group col-4 px-5 mt-5">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                  </svg></span>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInputGroup1" placeholder="Email" name="email" required>
                        <label for="floatingInputGroup1">Email</label>
                    </div>
                </div>
                <div class="input-group col-4 px-5 pt-4">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                  </svg></span>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingInputGroup" placeholder="password" name="password" required> 
                        <label for="floatingInputGroup1">Password</label>
                    </div>
                </div>
                <div class="col-8 mt-3 ps-5"><div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="myFunction()">
                <label class="form-check-label checlab" for="flexCheckDefault" style="color:white">
                   show password
                </label></div>
                </div>  
                <div class="col-4 mt-3">
                <a href="forgotpass.php" class="link-forgot" style="color:white">Forgot Password?</a>
                </div>
                <div class="col-8 ms-5 mt-3 pt-4 butt">
                    <button type="submit" class="form-control" style="background-image: linear-gradient(to left,#90EE90,#87CEFA);">LOGIN</button><br>
                </div>
                <div class="py-3 px-5" style="color:white">
                    Don't have an account? <a href="register.php" class="signupbutt" style="color:white">Sign Up</a>
                </div>
            </div>
         </div>
    </div>
</form>
<script>
function myFunction() {
    var x = document.getElementById("floatingInputGroup");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
</body>
</html>
_END;

?>