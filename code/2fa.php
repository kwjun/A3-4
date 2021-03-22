<?php include("templates/page_header.php");?>
<?php
#Hardcoding answer for each user's question
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if($_SESSION['id'] == 1 && $_POST['answer'] == "sheridan"){
        $_SESSION['authenticated'] = True;
        header("Location: /admin.php");
    }else if($_SESSION['id'] == 2 && $_POST['answer'] == "SSD"){
        $_SESSION['authenticated'] = True;
        header("Location: /admin.php");
    }else{
        header("Location: /login.php");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
	<title>Login</title>
	<?php include("templates/header.php"); ?>
<style>

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}

.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}

.form-signin .form-control:focus {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
</head>

<body>
	<?php include("templates/nav.php"); ?>
	<?php include("templates/contentstart.php"); ?>
<form class="form-signin" action='#' method='POST'>
      <h1 class="h3 mb-3 font-weight-normal">
      <?php
        #Hardcoding 2FA question for each user
        if($_SESSION['id'] == 1){
            echo 'College you are attending?';
        }else if($_SESSION['id'] == 2){
            echo 'What is your favourite class?';
        }else{
            header("Location: /login.php");
        }
      ?>
      </h1>
      <label for="inputUsername" class="sr-only">Answer</label>
      <input type="text" id="answer" class="form-control" placeholder="answer" required autofocus name='answer'>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
<br>
	<?php include("templates/contentstop.php"); ?>
	<?php include("templates/footer.php"); ?>
</body>
</html>
