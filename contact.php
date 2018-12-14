<?php
include_once 'partials/header.php';


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
    <h3>Send Us a Message </h3>

    <form action="sendEmail.php" method="post">

        <div class="row">

            <div class="col-md-6">

                <div class="form-group">
                    <label for="nameField">Fullname</label>
                    <input type="text" class="form-control" name="name" id="nameField" placeholder=" Full Name">
                </div>


                <div class="form-group">
                    <label for="emailField">Email</label>
                    <input type="text" class="form-control" name="mail" id="emailField" placeholder="Your e-mail">
                </div>

                <div class="form-group">
                    <label for="usernameField">Subject</label>
                    <input type="text" class="form-control" name="subject" id="usernameField" placeholder="Subject">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="usernameField">Write your Message</label>
                    <textarea name="message" class="form-control" placeholder="message"
                              style="width: 100%; height: 220px;"></textarea>
                </div>
            </div>
        </div>


        <button type="submit" name="submit" class="btn btn-primary pull-right">Send</button>
    </form>

</div>
<p><a href="index.php">Back</a></p>

<hr>

<?php include_once 'partials/footer.php' ?>


</body>
</html>