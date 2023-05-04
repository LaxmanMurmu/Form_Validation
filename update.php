<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php 
    $Id=$_GET['id'];
    echo $Id;
    require 'db_connect.php';

    $sql= "SELECT basic_info.id, basic_info.firstname, basic_info.lasstname, basic_info.email, basic_info.phone, basic_info.image, basic_info.designation, qualification.id, qualification.class, qualification.board, qualification.percentage, qualification.city FROM basic_info LEFT JOIN qualification ON basic_info.id=qualification.id WHERE basic_info.id=$Id GROUP BY qualification.id";

    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    ?>

    <form action="update1.php?id=<?php echo $Id?>" method="POST" enctype="multipart/form-data">
        <div class="container" id="main-page">
            <h2 class="font">Personal Details:-</h2>
            <div class="container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">FirstName:</label>
                                <input type="text" class="form-input" value="<?php echo $row['firstname']?>"
                                    id="firstname" name="fname" aria-describedby="emailHelp"
                                    placeholder="Enter FirstName" required onchange=checkfirstname()>
                                <div id="fname"></div>


                            </div>
                        </div>
                        <!--col-md-4-->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lastname">LastName:</label>
                                <input type="text" class="form-input" value="<?php echo $row['lasstname']?>"
                                    name="lname" id="lastname" aria-describedby="emailHelp" placeholder="Enter LastName"
                                    required onchange=checklastname()>

                                <div id="lname"></div>
                            </div>



                        </div>
                        <!--col-md-4-->
                        <div class="col-md-4" style='position: absolute;right: 0;'>
                            <!--This col for alerts -->
                            <img src="<?php echo $row['image']?>" class="img-fluid rounded-top" alt=""
                                style='width:300px;height:300px;' id='update-page-img'>
                        </div>
                        <!--col-md-4-->


                    </div>
                    <!--row-->
                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Email</label>
                                <input type="email" class="form-input" value="<?php echo $row['email']?>" name="email"
                                    id="email" aria-describedby="emailHelp" placeholder="Enter Email" required
                                    onchange=checkvalidemail()>
                            </div>
                            <div id="emailerror"></div>
                        </div>
                        <!--col-md-4-->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="number">Phone</label>
                                <input type="number" class="form-input" value="<?php echo $row['phone']?>" name="number"
                                    id="number" aria-describedby="emailHelp" placeholder="Enter Your Number" required
                                    onchange=checkvalidnumber()>
                            </div>
                            <div id="numbererror"></div>

                        </div>
                        <!--col-md-4-->
                    </div>
                    <!--row-->
                    <div class="row my-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Image</label>
                                    <input class="form-control" type="file" name="image" id="formFile"
                                        accept="image/png, image/jpeg, image/gif">
                                    <input type="hidden" name="old_image" value="<?php echo $row['image']?>">
                                </div>

                            </div>
                        </div>
                        <!--col-md-4-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-input" name="desig"
                                    value="<?php echo $row['designation']?>" id="designation"
                                    aria-describedby="emailHelp" placeholder="Designation">

                            </div>
                        </div>
                    </div>
                    <!--row-->
                </div>
            </div>
            <div class="h-holder">
                <h2 class="font">Education Detail:-</h2>
            </div>
            <?php
        // select qualifications for this person
        $qual_query = "SELECT * FROM qualification WHERE id = '$Id'";
        $qual_result = mysqli_query($conn, $qual_query);
        $qual_num = mysqli_num_rows($qual_result);
        if ($qual_num > 0) {
            while ($qual_row = mysqli_fetch_array($qual_result)) {

              
?>
            <div class="container">
                <div id="rows-container" class="my-4">
                    <div class="original-row">
                        <div class="row my-4">
                            <input type="hidden" name="que_id[]" value="<?php echo $qual_row['que_id']?>">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="class">Class</label>
                                    <input type="text" class="form-input" name="cls[]"
                                        value="<?php echo $qual_row['class']?>" id="class" aria-describedby="emailHelp"
                                        placeholder="Enter Class">
                                </div>
                            </div>
                            <!--col-md-4-->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="board">Board</label>
                                    <input type="text" class="form-input" id="board" name="board[]"
                                        value="<?php echo $qual_row['board']?>" aria-describedby="emailHelp"
                                        placeholder="Enter Board(like:-CBSE)">

                                </div>
                            </div>
                            <!--col-md-4-->

                        </div>
                        <!--row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="percentage">Percentage</label>
                                    <input type="number" class="form-input" name="percentage[]"
                                        value="<?php echo $qual_row['percentage']?>" id="percentage" min="0" max="100"
                                        step="0.01" placeholder="Enter percentage %" required
                                        onchange=checkpercentage()>
                                    <div id="percentageerror"></div>
                                </div>

                            </div>
                            <!--col-md-4-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">city</label>
                                    <input type="text" class="form-input" id="city" name="city[]"
                                        value="<?php echo $qual_row['city']?>" aria-describedby="emailHelp"
                                        placeholder="Enter city(e.g:-jaipur)">

                                </div>
                            </div>
                            <!--col-md-4-->
                        </div>
                    </div>
                    <!--row-->

                </div>
                <!--row-container-->

            </div>
            <?php } ?>
            <?php } ?>

            <button type="submit" name="submit" class="btn btn-primary">submit</button>

        </div>


        </div>
        <!--container-->
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
    function checkpercentage() {
        let percentageField = document.getElementById('percentage');
        let per_value = percentageField.value;

        if (per_value < 0 || per_value > 100 || per_value == "" || isNaN(per_value)) {
            let percentageError = document.getElementById('percentageerror');
            percentageError.innerHTML = "<p style='color:red'>Percentage must be a number between 0 and 100</p>";
            return false;
        } else {
            let percentageError = document.getElementById('percentageerror');
            percentageError.innerHTML = "";
            return true;
        }
    }

    function checkfirstname() {
        let name = document.getElementById("firstname");
        let name_value = name.value;
        let regex = /^[a-zA-Z\s]+$/;
        if (!regex.test(name_value)) {
            // alert("Invalid name! Only letters and spaces are allowed.");
            let fname = document.getElementById('fname').innerHTML =
                "<p style='color:red'>Name only allow to enter letter or spaces</p>";
            name.value = "";

        }

        if (regex.test(name_value)) {
            let fname = document.getElementById('fname').innerHTML = "";

        }
    }

    function checklastname() {
        let name = document.getElementById("lastname");
        let name_value = name.value;
        let regex = /^[a-zA-Z\s]+$/;
        if (!regex.test(name_value)) {
            // alert("Invalid name! Only letters and spaces are allowed.");
            let fname = document.getElementById('lname').innerHTML =
                "<p style='color:red'>Name only allow to enter letter or spaces</p>";
            name.value = "";

        } else if (regex.test(name_value)) {
            let fname = document.getElementById('lname').innerHTML = "";
        }
    }

    function checkvalidemail() {
        let email = document.getElementById("email").value;
        let email_value = email.value;
        let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(email)) {
            let emailerror = document.getElementById("emailerror").innerHTML =
                "<p style ='color:red'>please enter a valid email</p>";
            email.value = "";
        } else {
            let emailerror = document.getElementById("emailerror").innerHTML = "";
        }
    }

    function checkvalidnumber() {

        let number_feild = document.getElementById('number');
        let value = number_feild.value;
        let numbers = value.toString().split('').map(Number)

        if (numbers.length > 10) {
            let numbererror = document.getElementById('number').innerHTML =
                "<p style='color:red'>Number must be  required 10 digit</p>";
        } else if (numbers.length < 10) {
            let numbererror = document.getElementById('numbererror').innerHTML =
                "<p style='color:red'>Number must be  required 10 digit</p>";

        } else {
            let numbererror = document.getElementById('numbererror').innerHTML = "";
        }
    }
    </script>
</body>

</html>