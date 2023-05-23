<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup2.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="" method="post" autocomplete="off">
                <h1>Account Login</h1>
                <label for="usernameemail">Username or Email: </label>
                <input type="text" name="usernameemail" id="usernameemail"  required value="">
                <br>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required value="">
                <button type="button" id="showPasswordButton" class="show-password-button" onclick="togglePasswordVisibility('password', 'showPasswordButton')">Show</button>
                <button type="submit" name="submit">Login</button>
                <span>Don't have an account? <a href="registration.php">Register here</a></span>
            </form>
            <br>
        </div>
    </div>
    <?php
if(isset($_POST['submit'])){
    require '_dbcon.php';
    $usernameemail = $_POST['usernameemail'];
    $password = $_POST['password']; // add isset() check here
    $result = mysqli_query($connect, "SELECT * FROM db WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
        if(!empty($row) && $password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: index.html");
        }
        else{
            echo "<script>alert('Incorrect Password');</script>";
        }
    }else{
        echo "<script>alert('User not Registered');</script>";
    }
}
?>

<script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var showPasswordButton = document.getElementById("showPasswordButton");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                showPasswordButton.textContent = "Show";
            }
        }
</script>
</body>
</html>
