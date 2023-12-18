<?php
session_start();
$filename = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];
$folder = "uploads/";
move_uploaded_file($tempName, $folder . $_FILES['image']['name']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/395d7dabe4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script2.js"></script>
    <title>Admit Card</title>
</head>

<body>

    <div class="container box mt-4">
        <div class="row">
            <div class="d-flex justify-content-around">
                <p class="h3" id="instituteName">CHANDIGARH UNIVERSITY</p>
                <p class="h3">ADMIT CARD</p>
            </div>
        </div>
        <hr>
        <div class="contentbox">
            <div class="d-flex justify-content-between">
                <div class="details">
                    <p class="personalDetails d-inline-block h6">Admit Card Number:</p><span
                        id="admitCardNumber">0011</span><br>
                    <p class="personalDetails d-inline-block h6">Name of Candidate:</p><span id="candidateName">
                        <?php echo $_POST['name']; ?>
                    </span><br>
                    <p class="personalDetails d-inline-block h6">Father's Name:</p><span id="fatherName">
                        <?php echo $_POST['FName']; ?>
                    </span><br>
                    <p class="personalDetails d-inline-block h6">Date of Birth:</p><span id="birthDay">
                        <?php echo $_POST['DOB']; ?>
                    </span><br>
                    <p class="personalDetails d-inline-block h6">Roll Number:</p><span id="rollNumber">
                        <?php echo $_POST['rollno']; ?>
                    </span><br>
                    <p class="personalDetails d-inline-block h6">Address:</p><span id="CandidateAddress">
                        <?php echo $_POST['address']; ?>
                    </span><br>
                </div>
                <div class="pics">
                    <img src="<?php echo $folder . $_FILES['image']['name']; ?>" alt="Profile Pic" width="100px"
                        id="imgT">
                </div>
            </div>
            <hr>
            <div class="container mt-2">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="4" class="text-center h4" id="examName">XYZ Entrance Test</th>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <th>Timings</th>
                            <th>Subjects</th>
                            <th>Invigilator's Signature</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="Date">
                                <?php echo $_POST['dateOFexam']; ?>
                            </td>
                            <td id="timings">
                                <?php echo $_POST['timeOFexam']; ?>
                            </td>
                            <td id="subjects">Entrance Test</td>
                            <td id="inviSign"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="centerAddrsss mt-2">
                <p class="h4">EXAMINATION NAME & ADDRESS:</p>
                <input type="text" name="centerName" id="centerName"
                    value="Chanidgarh University Block-B4, Shahbjada Ajitsingh Nagar, 140314">
            </div>
            <hr>
            <div class="footer">
                <h4>INSTRUCTIONS TO THE CANDIDATE:</h4>
                <ol type="1">
                    <li>Please bring this admit card along with a valid photo ID to the examination hall.</li>
                    <li>Ensure that the photograph and signature on the admit card are clear and recognizable.</li>
                    <li>Report to the examination center at least 30 minutes before the scheduled exam time.</li>
                    <li>Electronic devices, including mobile phones, smartwatches, and calculators, are strictly
                        prohibited inside the examination hall.</li>
                    <li>Candidates are required to follow the dress code specified by the examination authority.
                    </li>
                    <li>Any kind of malpractice during the examination will result in immediate disqualification.
                    </li>
                    <li>Candidates must not write anything on the admit card. Any kind of tampering with the admit
                        card
                        may lead to disqualification.</li>
                    <li>The admit card is non-transferable. It should not be shared with anyone else.</li>
                    <li>Candidates are advised to read the instructions on the question paper carefully before
                        starting
                        the exam.</li>
                    <li>In case of any discrepancy or issue with the admit card, contact the examination authority
                        immediately.</li>
                    <li>Do not forget to carry necessary stationery items like pens, pencils, erasers, and rulers.
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="my-3 text-center" style="display: block; margin: auto; width: 300px;">
        <button onclick="printAdmit()" class="btn btn-primary btn-lg">Print Admit Card</button>
    </div>
    <div class="container text-center mb-5">
        <a href="<?php echo $_SESSION['dashboardURL']; ?>" class="btn btn-primary btn-lg">Back</a>
    </div>


    <script src="https://kit.fontawesome.com/395d7dabe4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>