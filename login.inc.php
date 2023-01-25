<?php
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(!isset($email)){
		if($email == ""){
			echo '<script>
		alert("email Field Required");
		window.location = "login.php";
		</script>';
		}
	}elseif(!isset($password)){
		if($password == ""){
			echo '<script>
		alert("Password Field Required");
		window.location = "login.php";
		</script>';
		}
	}else{
        $con = new mysqli('localhost', 'root', '', 'victorvirtuals') or die(mysqli_error($con));
        $sql = "SELECT * FROM `users` WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($con, $sql);
        if(!$result){
            die(mysqli_connect_error($con, $sql));
        }else{
			echo '<script>
		alert("Logged In Successfully");
		window.location = "account.php";
		</script>';
		}
        
	}
}
?>