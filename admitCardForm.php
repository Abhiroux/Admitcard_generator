<?php
session_start();
$serializedData = urldecode($_GET['profile']);
$profileArray = unserialize($serializedData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit Card Generator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/395d7dabe4.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            color: rgb(136, 72, 239) !important;
        }

        body {
            /* background-color: rgb(136, 72, 239); */
            color: #fff;
        }

        #admitCard-form {
            background-color: white;
            color: black;
            /* width: 700px; */
            display: block;
            margin: auto;
            border: none;
            /* border-radius: 10px; */
            background-color: #f8f9fa;
        }

        .headerbox {
            height: 200px;
        }

        .btn {
            background-color: rgb(136, 72, 239);
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
                    <a href="logoutScript.php" class="nav-item nav-link d-flex flex-column align-items-center">
                        <span><i class="fa-solid fa-arrow-right-from-bracket text-light"></i></span>
                        <span>Log out</span>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <form action="admitcard.php" method="post" enctype="multipart/form-data" class="form-container">
        <div class="" id="admitCard-form">
            <div class="container">
                <div class="headerbox d-flex justify-content-center align-items-center">
                    <h1 class="display-4">Admit Card Generator Form</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Personal Information</h3>
                        <div class="form-group mt-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Full Name"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="FName">Father's Name</label>
                            <input type="text" name="FName" id="FName" class="form-control" placeholder="Father's Name"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="DOB">Date of Birth</label>
                            <input type="date" name="DOB" id="DOB" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="rollno">Roll Number</label>
                            <input type="text" name="rollno" id="rollno" class="form-control" required
                                placeholder="Roll No.">
                        </div>
                        <div class="form-group mt-3">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control" required
                                placeholder="Enter Your Address"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="image">Passport sized photo</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>
                        <div class="mt-5">
                            <h3 class=>Examination Information</h3>
                            <div class="form-group mt-3">
                                <label for="dateOFexam">Date of Examination</label>
                                <input type="date" name="dateOFexam" id="dateOFexam" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="timeOFexam">Time of Examination</label><br>
                                <select class="form-control" id="timeOFexam" name="timeOFexam" required>
                                    <option selected>SELECT TIME SLOT</option>
                                    <option value="09:00AM to 10:00AM">09:00AM to 10:00AM</option>
                                    <option value="01:00PM to 02:00PM">01:00PM to 02:00PM</option>
                                    <option value="03:00PM to 04:00PM">03:00PM to 04:00PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center mt-3 mb-4">
                    <button type="submit" class="btn btn-lg text-light">Generate Admit
                        Card</button>
                </div>
            </div>
        </div>
    </form>

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