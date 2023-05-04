<h2 class="font">Personal Details:-</h2>
<div class="container">
    <div class="container">
        <div class="row">



            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstname">FirstName:</label>
                    <input type="text" class="form-input" id="firstname" name="fname" aria-describedby="emailHelp"
                        placeholder="Enter FirstName" required onchange=checkfirstname()>
                    <div id="fname"></div>

                </div>
            </div>
            <!--col-md-4-->

            <div class="col-md-4">
                <div class="form-group">
                    <label for="lastname">LastName:</label>
                    <input type="text" class="form-input" name="lname" id="lastname" aria-describedby="emailHelp"
                        placeholder="Enter LastName" required onchange=checklastname()>

                    <div id="lname"></div>
                </div>



            </div>
            <!--col-md-4-->
            <div class="col-md-4">
                <!--This col for alerts -->
                <!--This alert is for success -->
                <?php
        $success =false;
        if($success){
          echo "<div class='info'>
          <div class='alert alert-success alert-dismissible fade show' role='alert'>
  <div class='text-center'><strong class=>Success</strong></div> <p>we got Your data, Thanks for give us your time </p>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
          </div>";
        }
          ?>
            </div>
            <!--col-md-4-->
         </div>

         

             <!--row-->
        <div class="row my-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstname">Email</label>
                    <input type="email" class="form-input" name="email" id="email" aria-describedby="emailHelp"
                        placeholder="Enter Email" required onchange=checkvalidemail()>
                </div>
                <div id="emailerror"></div>
            </div>
            <!--col-md-4-->

            <div class="col-md-4">
                <div class="form-group">
                    <label for="number">Phone</label>
                    <input type="number" class="form-input" name="number" id="number" aria-describedby="emailHelp"
                        placeholder="Enter Your Number" required onchange=checkvalidnumber()>
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
                        <label for="formFile" class="form-label" >Upload Image</label>
                        <input class="form-control" type="file" name="image" id="formFile" accept="image/png, image/jpeg, image/gif">
                    </div>

                </div>
            </div>
            <!--col-md-4-->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-input" name="desig" id="designation" aria-describedby="emailHelp"
                        placeholder="Designation">

                </div>
            </div>
        </div>
        <!--row-->
    </div>
</div>

<script>
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