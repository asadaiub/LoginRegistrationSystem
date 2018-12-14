<?php

$page_title = "User Authentication System -HomePage";
include_once 'partials/header.php';

?>

<div>


    <main role="main" class="container">

        <div class="flag">
            <h1>Blog User Authentication System</h1>
            <p class="lead">Welcome to the Blog User Authentication System <br> To Start using this application please
                do the registration first.<br> If you are a old user then log in to use it...</p>
        </div>

    </main><!-- /.container -->


    <h1>Follow the instruction to use the application</h1>
    <hr>
    <p>Subscribed User ? <a href="login.php">Login</a></p>
    <p>Not Yet a Member? <a href="signup.php">Sign Up</a></p>
    <br>
    <p>You are logged in as {username} <a href="logout.php">Logout</a></p>


</div>


<?php include_once 'resource/Database.php' ?>

<?php include_once 'partials/footer.php' ?>

</body>
</html>