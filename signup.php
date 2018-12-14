<?php
include_once 'resource/Database.php';
include_once 'resource/utilities.php';
$page_title = "User Authentication System -HomePage";
include_once 'partials/header.php';


if (isset($_POST['signupBtn'])) {

//initialising a array to store any error message from
    $form_errors = array();


//Form validation
    $required_fields = array('email', 'username', 'password');


// call the function to check empty field
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));


// fields that requires checking for minimum length
    $fields_to_check_length = array('username' => 4, 'password' => 6);


    //calls the function to check minimum required lenght
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));


    //email validation
    $form_errors = array_merge($form_errors, check_email($_POST));


//check if error is empty, if yes process from data and insert record

    if (empty($form_errors)) {


        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        //hashing the password

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {


            $sqlInsert = "INSERT INTO users (username, email, password, join_date)
                     VALUES(:username, :email, :password, now())";

            //create SQL insert statement
            $statement = $db->prepare($sqlInsert);


            //add the data into the database

            $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));


            //check if one new row was created
            if ($statement->rowCount() == 1) {
                $result = "<p style='padding:20px; border:1px solid gray; color:green;'> Registration Successful</p>";
            }


        } catch (PDOException $ex) {

            $result = "<p style='padding:20px; border:1px solid gray; color:red;'> An error occured:" . $ex->getMessage() . "</p>";
        }
    } else {

        if (count($form_errors) == 1) {

            $result = "<p style='color:red;'> There was 1 error in the form<br>:";
            $result .= "<ul style='color: red;'>";

            //loop through error array and display all items


            foreach ($form_errors as $error) {

                $result .= "<li>{$error}</li>";

            }
            $result .= "</ul></p>";

        } else {
            $result = "<p style='color:red;'> There was " . count($form_errors) . "    errors in the form<br>";
            $result .= "<ul style='color: red;'>";

            //loop throught error array and display all time

            foreach ($form_errors as $error) {

                $result .= "<li>{$error}</li>";
            }
            $result .= "</ul></p>";
        }
    }
}


?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Register Page</title>
</head>
<body>

<h1>User Authentication System</h1>
<hr>


<div class="container">

    <section class="col col-lg-7">
        <h1>Registration Form</h1>
        <?php if (isset($result)) echo $result; ?>
        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>


        <form action="" method="post">


            <div class="form-group">
                <label for="emailField">Email</label>
                <input type="text" class="form-control" name="email" id="emailField" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="usernameField">Username</label>
                <input type="text" class="form-control" name="username" id="usernameField" placeholder="Username">
            </div>

            <div class="form-group">
                <label for="passwordField">Password</label>
                <input type="password" name="password" class="form-control" id="passwordField" placeholder="Password">
            </div>

            <button type="submit" name="signupBtn" class="btn btn-primary pull-right">Sign Up</button>
        </form>
    </section>
</div>
<p><a href="index.php">Back</a></p>

<hr>

<?php include_once 'partials/footer.php' ?>


</body>
</html>