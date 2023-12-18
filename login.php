<?php
require "pdo.php";
require_once "hash_details.php";
session_start();
$_SESSION['invalidMessage'] = "";
if (isset($_POST['email']) && isset($_POST['pass'])) {
  unset($_SESSION['invalidMessage']);
  try {
    $sql = "SELECT * FROM users where email = :em";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
      array(
        ':em' => $_POST['email']
      )
    );
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row === false) {
      $_SESSION["invalidMessage"] = "Invalid email or password";
    } else {
      if (password_verify($salt . $_POST['pass'], $row['password'])) {
        // header("Location: dashboard.php?name=" . $row['name']);
        header("Location: dashboard.php?profile=" . urlencode(serialize($row)));
        $_SESSION['loggedin'] = true;
        $userName = $row['name'];
        $_SESSION['dashboardURL'] = "dashboard.php?profile=" . urlencode(serialize($row));
        return;
      } else {
        $_SESSION["invalidMessage"] = "Invalid email or password";
      }
    }
  } catch (Exception $e) {
    echo ("Internal error occurred, please contact support");
    error_log("login.php, SQL error=" . $e->getMessage());
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Admit Card Generator</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      background-color: rgb(136, 72, 239);
    }

    .login-container {
      background-color: #ffffff;
      max-width: 400px;
      margin: 100px auto;
      padding: 40px;
      border-radius: 10px;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Auto-hide the alert after 5 seconds
      setTimeout(function () {
        document.getElementById('alertMessage').style.display = 'none';
      }, 5000);
    });
  </script>
</head>

<body>
  <div class="container mt-5">
    <!-- Display the Bootstrap warning alert with the message -->
    <?php
    if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
      echo '
                    <div id="alertMessage" class="alert alert-warning alert-dismissible fade show" role="alert">
                        ' . $message . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
      unset($_SESSION['message']); // Remove the message from the session
    }
    ?>
    <!-- Rest of your login page content -->
  </div>
  <div class="container">
    <div class="login-container">
      <h2 class="text-center mb-4">Login here</h2>
      <form method="post">
        <p class="text-danger">
          <?php
          if (isset($_SESSION['invalidMessage'])) {
            echo $_SESSION['invalidMessage'];
          }
          ?>
        </p>
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="pass" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
      </form>
      <p class="text-center mt-3">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
  </div>
</body>

</html>