<?php
	if(isset($_POST['submit'])){
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$email = $_POST['email'];
		$new_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phone = $_POST['phone'];
		$message = $_POST['message'];
	
		if(!isset($fname)){
			if($fname == ""){
                echo '<script>
            alert("All Fields Required");
            window.location = "blog-details.php";
            </script>';
            }
		}if(!isset($lname)){
			if($lname == ""){
                echo '<script>
            alert("All Fields Required");
            window.location = "blog-details.php";
            </script>';
            }
		}elseif(!isset($email)){
			if($email == ""){
                echo '<script>
            alert("All Fields Required");
            window.location = "blog-details.php";
            </script>';
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					echo '<script>
				alert("Email is Invalid");
				window.location = "blog-details.php";
				</script>';
			}
		}elseif(!isset($phone)){
			if($phone == ""){
                echo '<script>
            alert("All Fields Required");
            window.location = "blog-details.php";
            </script>';
            }
		}elseif(!isset($message)){
			if($message == ""){
                echo '<script>
            alert("All Fields Required");
            window.location = "blog-details.php";
            </script>';
            }
		}
		$con = new mysqli('localhost', 'root', '', 'victorvirtuals') or die(mysqli_connect_error($con));
		$sql = "INSERT INTO `blogmsg` (firstname, lastname, email, phone, message) VALUE ('$fname','$lname','$new_email', '$phone', '$message')";
		$result = mysqli_query($con, $sql);
		if(!$result){
			die(mysqli_error($con));
		}else{
                echo '<script>
            alert("Comments Successfully Sent");
            window.location = "contact.php";
            </script>';
		}
	}
?>