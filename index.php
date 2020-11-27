<!DOCTYPE html>
<?php
 session_start();


?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Xtrasoft Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
    font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="login-form">
    <form action="login.php" method="post">
        <h2 class="text-center">Xtrasoft</h2>       
        <div class="form-group">
            <input type="text" name="id" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
                        <?php
             
            if(isset($_SESSION['err'])){
            // remove all session variables
                echo "<p class='text-danger'>".$_SESSION['err']."</p>";
             unset($_SESSION['err']);
            }

            if(isset($_SESSION['user'])){
            // remove all session variables
             echo "<p class='text-primary'>".$_SESSION['user']. " have been successfully logged out!</p>";
             unset($_SESSION['user']);
            }
            ?>
            
           <!-- <a href="#" class="float-right">Forgot Password?</a> -->
        </div>        
    </form>
    <!--<p class="text-center"><a href="#">Create an Account</a></p> -->
</div>
</body>
</html>
