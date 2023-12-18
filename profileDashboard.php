<?php
session_start();
//Accessing the Post-Redirected-Get data sent from dashboard page
$serializedData = urldecode($_GET['profile']);
$profileArray = unserialize($serializedData);

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $message = "Please log in to access the dashboard.";
    $_SESSION['message'] = "Please log in to access the dashboard.";
    header("location: login.php");
    exit;
}

if(isset($_POST))
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS CDN link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom CSS styles */
        body {
            background-color: #f8f9fa;
            background-image: url('https://via.placeholder.com/1600x900');
            /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .profile-container {
            position: relative;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2 {
            color: rgb(136, 72, 239);
        }

        .profile-container p {
            color: #6c757d;
        }

        .edit-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: rgb(136, 72, 239);
            border-color: rgb(136, 72, 239);
        }

        .action-button {
            background-color: rgb(136, 72, 239);
            border: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg" id="navv" style="background-color: rgb(136, 72, 239);">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $_SESSION['dashboardURL'] ?>"><span class="h3">Admit Card
                    Generator</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ml-auto" id="link">
                    <a href="#" class="nav-item nav-link d-flex flex-column align-items-center mx-5">
                        <span><i class="fa-solid fa-user text-light"></i></span>
                        <span>
                            <?php
                            echo htmlentities($profileArray['name']);
                            ?>
                        </span>
                    </a>
                    <form method="post">
                        <a href="logoutScript.php" class="nav-item nav-link d-flex flex-column align-items-center"
                            role="button">
                            <span><i class="fa-solid fa-arrow-right-from-bracket text-light"></i></span>
                            <span>Logout</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <div class="profile-container">
        <a href="#" class="btn btn-primary edit-button" data-toggle="modal" data-target="#myModal">
            <i class="fas fa-edit"></i> Edit
        </a>

        <!-- Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <form class="modal-content" method="POST">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p>
                        <div class="form-group">
                            <label for="name"><strong>Name:</strong></label>
                            <input type="text" class="form-control" name="Uname"
                                value="<?php echo $profileArray['name'] ?>" required>
                        </div>
                        </p>
                        <p>
                        <div class="form-group">
                            <label for="name"><strong>Email:</strong></label>
                            <input type="email" class="form-control" name="Uemail"
                                value="<?php echo $profileArray['email'] ?>" required>
                        </div>
                        </p>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary action-button" data-dismiss="modal"
                            name="Update">Update</button>
                    </div>

                </form>
            </div>
        </div>

        <h2>Your Profile</h2>
        <p><strong>Name:</strong>
            <?php echo $profileArray['name'] ?>
        </p>
        <p><strong>Email:</strong>
            <?php echo $profileArray['email'] ?>
        </p>
        <p><strong>User Id:</strong>
            <?php echo $profileArray['user_id'] ?>
        </p>
        <!-- <p><strong>Member Since:</strong> January 1, 2023</p> -->
        <a href="#" class="btn btn-primary action-button">
            Change Password
        </a>
        <a href="#" class="btn btn-danger">
            Delete Account
        </a>
    </div>
    <!-- Bootstrap JS CDN link -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e699d24356.js" crossorigin="anonymous"></script>
</body>

</html>