<?php  

include('connection.php');
$db = new PDO("mysql:dbname=blog;host=localhost","root","");
$register_stmt = $db -> prepare("insert into users(username,email,password,dob) values(?,?,?,?)");

$blogs = $db -> query("select * from blogs");

    $username = "";
    $email = "";
    $pwd = "";
    $confirm_pwd = "";
    $dob = time();

    if ($_SERVER["REQUEST_METHOD"] = 'POST'){
        $username = $_REQUEST["username"];
        $email = $_REQUEST["email"];
        $pwd = $_REQUEST["pdw"];
        $confirm_pwd = $_REQUEST["confirm_pwd"];

        //if ($pwd == $confirm_pwd){
            $register_stmt -> execute(array($username,$email,$pwd,$dob));
        header("Location: http://localhost:8090/index.php",true,301);
       // }
    }


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>My Blog - Registration Form</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php include('header.php'); ?>

		<h2>User Details Form</h2>
		<h4>Please, fill below fields correctly</h4>
		<form action="register.php" method="post">
				<ul class="form">
					<li>
						<label for="username">Username</label>
						<input type="text" name="username" id="username" required/>
					</li>
					<li>
						<label for="fullname">Full Name</label>
						<input type="text" name="fullname" id="fullname" required/>
					</li>
					<li>
						<label for="email">Email</label>
						<input type="email" name="email" id="email" />
					</li>
					<li>
						<label for="pwd">Password</label>
						<input type="password" name="pwd" id="pwd" required/>
					</li>
					<li>
						<label for="confirm_pwd">Confirm Password</label>
						<input type="password" name="confirm_pwd" id="confirm_pwd" required />
					</li>
					<li>
						<input type="submit" value="Submit" /> &nbsp; Already registered? <a href="index.php">Login</a>
					</li>
				</ul>
		</form>
	</body>
</html>