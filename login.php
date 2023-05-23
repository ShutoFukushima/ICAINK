<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,md5($password));
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ICA Ink | Log In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css?<?php echo time();?>">
</head>
<body>
    <div class="center">
      <h1>ICA Ink - Login</h1>
      <form method="post">
        <div class="txt_field">
         <input type="email" class="input" required name="useremail"/>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" class="input" required name="password"/>
          <span></span>
          <label>Password</label>
        </div>
        <div class="submit">
        <input type="submit" name="submit" value="submit">
        </div>
      </form>
    </div>

  </body>
</html>

