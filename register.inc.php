<?php
    if(isset($_POST['submit'])){
        extract($_POST);
        
        $fname = $POST['firstname'];
        $lname = $POST['lastname'];
        $email = $POST['email'];
        $new_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phone = $POST['phone'];
        $country = $POST['country'];
        $password = $POST['password'];
        $cpassword = $POST['cpassword'];
        $agree = $POST['agree'];
    
        if(!isset($_POST['firstname'])){
            if($fname == ""){
                echo '<script>
            alert("firstname Fields Required");
            window.location = "register.php";
            </script>';
            }
        }elseif(!isset($_POST['lastname'])){
            if($lname == ""){
                echo '<script>
            alert("lastname Fields Required");
            window.location = "register.php";
            </script>';
            }
        }elseif(!isset($_POST['email'])){
            if($email == ""){
                echo '<script>
            alert("Email Fields Required");
            window.location = "register.php";
            </script>';
            }elseif(!filter_var($new_email, FILTER_VALIDATE_EMAIL)){
                    echo '<script>
                alert("Email is Invalid");
                window.location = "register.php";
                </script>';
            }
        }elseif(!isset($_POST['phone'])){
            if($phone == ""){
                echo '<script>
            alert("phone Fields Required");
            window.location = "register.php";
            </script>';
            }
        }elseif(!isset($_POST['country'])){
            if($country == ""){
                echo '<script>
            alert("country Fields Required");
            window.location = "register.php";
            </script>';
            }
        }elseif(!isset($_POST['password'])){
            if($password == ""){
                echo '<script>
            alert("password Fields Required");
            window.location = "register.php";
            </script>';
            }elseif($cpassword != $password){
                echo '<script>
            alert("password do not match");
            window.location = "register.php";
            </script>';
            }
        }elseif(!isset($_POST['agree'])){
            if($agree == ""){
                echo '<script>
            alert("agree Fields Required");
            window.location = "register.php";
            </script>';
            }
        }else{
            $con = mysqli_connect('localhost', 'root', '', 'victorvirtuals') or die("Database Connection Error".mysqli_connect_error($con));
            $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `phone`, `country`, `password`) WHERE ('$fname','$lname','$email','$phone','$country','$password')";
            
            $result = mysqli_query($con, $sql);
            if(!$result){
                die(mysqli_error($con));
            }else{
                echo '<script>
            alert("you have registered Successfully");
            window.location = "register.php";
            </script>';
            }
        }
    }
?>