<?php
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$new_email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$message = $_POST['message'];
	
		if(!isset($username)){
			if($username == ""){
                echo '<script>
            alert("All Fields Required");
            window.location = "contact.php";
            </script>';
            }
		}elseif(!isset($email)){
			if($gender == ""){
                echo '<script>
            alert("All Fields Required");
            window.location = "contact.php";
            </script>';
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					echo '<script>
				alert("Email is Invalid");
				window.location = "contact.php";
				</script>';
			}
		}elseif(!isset($message)){
			if($message == ""){
                echo '<script>
            alert("All Fields Required");
            window.location = "contact.php";
            </script>';
            }
		}
		$con = new mysqli('localhost', 'root', '', 'victorvirtuals') or die(mysqli_connect_error($con));
		$sql = "INSERT INTO `contactmsg` (username, email, message) VALUE ('$username', '$new_email', '$message')";
		$result = mysqli_query($con, $sql);
		if(!$result){
			die(mysqli_error($con));
		}else{
                echo '<script>
            alert("Fields Are Successfully Inserted");
            window.location = "contact.php";
            </script>';
		}
	}
?>