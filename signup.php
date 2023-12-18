<?php
require "pdo.php";
$msg = "";
$err_msg = "";
if (isset($_POST['fullName']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['confirmPass'])) {

    $query = "SELECT email FROM users WHERE email = :em";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':em' => $_POST['email']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
        if ($_POST['pass'] == $_POST['confirmPass']) {
            //password hashing
            $salt = "%&@()>!";
            $hash = password_hash($salt . $_POST['pass'], PASSWORD_DEFAULT);
            //sql query
            $sql = "INSERT INTO users (name, email, password) VALUES(:name, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                array(
                    ':name' => $_POST["fullName"],
                    ':email' => $_POST['email'],
                    ':password' => $hash
                )
            );
            // echo "Reistration Success";
            header("location: RegistrationLandingPage.php");
        } else {
            $msg = "Password does not match";
        }
    } else {
        $err_msg = "User Already Exist! Please Login";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Admit Card Generator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: rgb(136, 72, 239);
        }

        .signup-container {
            background-color: #ffffff;
            max-width: 400px;
            margin: 100px auto;
            padding: 40px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="signup-container">
            <h2 class="text-center mb-4">Sign Up</h2>
            <p class="text-danger">
                <?php echo $err_msg; ?>
            </p>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Full Name" name="fullName" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <p class="text-danger">
                    <?php echo $msg; ?>
                </p>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="pass" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPass"
                        required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Sign Up</button>
            </form>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>

</html>