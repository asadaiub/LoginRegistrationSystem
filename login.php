<?php

include_once 'resource/session.php';
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

$page_title = "User Authentication System -HomePage";
include_once 'partials/header.php';


if (isset($_POST['loginBtn'])) {

    //array to hold errors
    $form_errors = array();


    //validate
    $required_fields = array('username', 'password');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if (empty($form_errors)) {


        //collect form data
        $user = $_POST['username'];
        $password = $_POST['password'];

        //check if the user exist in the database

        $sqlQuery = "SELECT * FROM users WHERE username = :username";
        $statement = $db->prepare(@$sqlQuery);
        $statement->execute(array(':username' => $user));


        while ($row = $statement->fetch()) {
            $id = $row['id'];
            $hashed_password = $row['password'];
            $username = $row['username'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                header("location: index.php");

            } else {

                $result = "<p style='padding: 20px; color: red; border:1px solid gray'>Invalid Username or Password</p>";
            }


        }


    } else {
        if (count($form_errors) == 1) {

            $result = "<p style='color=red;'>There was one error in the form</p>";
        } else {

            $result = "<p style='color:red'>There were " . count($form_errors) . "error in the form</p>";
        }


    }

}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
<br>
<hr>

<div class="container">

    <section class="col col-lg-7">
        <h1>Login Page</h1>
        <?php if (isset($result)) echo $result; ?>
        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>

        <p><a href="index.php">Back</a></p>
        <form action="" method="post">
            <div class="form-group">
                <label for="usernameField">Username</label>
                <input type="text" class="form-control" name="username" id="usernameField" placeholder="Username">
            </div>

            <div class="form-group">
                <label for="passwordField">Password</label>
                <input type="password" name="password" class="form-control" id="passwordField" placeholder="Password">
            </div>


            <div class="checkbox">
                <label>
                    <input name="remember" value="yes" type="checkbox"> Remember Me
                </label>
            </div>


            <button type="submit" name="loginBtn" class="btn btn-primary pull-right">Sign In</button>
        </form>
    </section>
</div>

<hr>

<?php include_once 'partials/footer.php' ?>

</body>
</html>