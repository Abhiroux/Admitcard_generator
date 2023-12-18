<?php
session_start();
//Accessing the Post-Redirected-Get data sent from login page
$serializedData = urldecode($_GET['profile']);
$profileArray = unserialize($serializedData);
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $message = "Please log in to access the dashboard.";
    $_SESSION['message'] = "Please log in to access the dashboard.";
    header("location: login.php");
    exit;
}

if (isset($_POST['get_started'])) {
    header('location:admitCardForm.php?profile=' . urldecode(serialize($profileArray)));
    return;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }
    </style>
    <title>Document</title>
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
                    <a href="<?php echo "profileDashboard.php?profile=" . urlencode(serialize($profileArray)); ?>"
                        class="nav-item nav-link d-flex flex-column align-items-center mx-5">
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
    <div class="">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Admit Card Generator</h1>
                <p class="lead">Welcome to our Admit Card Generator. Create professional and personalized admit cards
                    for
                    your exams or events effortlessly.</p>
                <hr class="my-4">
                <p>Simply upload your details and photo, and our tool will generate an admit card for you.</p>
                <form method="post">
                    <button name="get_started" class="btn btn-lg text-light" role="button"
                        style="background-color: rgb(136, 72, 239);">Get
                        Started</button>
                </form>
                <ul class="list-unstyled text-left mt-5" style="font-size: 24px;">
                    <li><i class="fas fa-check " style="color: rgb(136, 72, 239);"></i> Customizable templates for
                        various
                        events</li>
                    <li><i class="fas fa-check " style="color: rgb(136, 72, 239);"></i> Automatic photo resizing and
                        cropping</li>
                    <li><i class="fas fa-check " style="color: rgb(136, 72, 239);"></i> Instant download and print
                        functionality</li>
                    <li><i class="fas fa-check " style="color: rgb(136, 72, 239);"></i> User-friendly interface for easy
                        card creation</li>
                    <li><i class="fas fa-check" style="color: rgb(136, 72, 239);"></i> QR code generation for easy
                        verification</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div>
                        <h2 style="color: rgb(136, 72, 239);">Simple and Easy to Use</h2>
                        <p class="lead">Create stunning admit cards in just a few clicks. Our intuitive interface makes
                            the
                            process hassle-free for everyone.</p>
                    </div>
                    <div>
                        <h2 style="color: rgb(136, 72, 239);">Effortless Admit Card Creation</h2>
                        <p class="lead">Our Admit Card Generator simplifies the process of creating personalized admit
                            cards for any event or examination.</p>
                    </div>
                    <div>
                        <h2 style="color: rgb(136, 72, 239);">Generate QR Codes</h2>
                        <p class="lead">Our tool automatically generates QR codes for each admit card, allowing for
                            quick and easy verification.</p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <img src="sampleAdmitCard.jpg" alt="Admit Card Generator" class="img-fluid"
                        style="height: 500px !important; ">
                </div>
            </div>
        </div>
    </div>
    <footer style="background-color: rgb(136, 72, 239); color: white;" class="pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <h5>About Us</h5>
                    <p>We are dedicated to providing a seamless and user-friendly experience for generating personalized
                        admit cards.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h5>Contact Us</h5>
                    <p>Email: info@admitcardgenerator.com</p>
                    <p>Phone: +91 70562 52434</p>
                </div>
                <div class="col-md-4 text-center">
                    <h5>Follow Us</h5>
                    <p>Stay updated with our latest news and features.</p>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <hr style="background-color: rgba(255,255,255,0.5);">
            <div class="text-center mt-3">
                <p>&copy; 2023 Admit Card Generator</p>
            </div>
        </div>
    </footer>



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