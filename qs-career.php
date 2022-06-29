<?php
include "conn.php";
  

  if(isset($_POST['submit']))
  {


    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $identity_type = $_POST['identity_type'];
    $present_address = $_POST['present_address'];
    $locality = $_POST['locality'];
    $city_town_village = $_POST['city_town_village'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $pincode = $_POST['pincode'];
    $mobile = $_POST['mobile'];
    $alt_mobile = $_POST['alt_mobile'];
    $email = $_POST['email'];
    // getting image files
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "careers/".$filename;
    move_uploaded_file($tempname, $folder);
    // end getting image files


    if($name != "" && $father_name != "" && $mother_name != "" && $dob != "" && $gender != "" && $nationality != "" && $identity_type != "" && $present_address != "" && $locality != "" && $city_town_village != "" && $country != "" && $state != "" && $district != "" && $pincode != "" && $mobile != "" && $alt_mobile != "" && $email != "")
    {
    $query = "INSERT INTO qs_career ( name, father_name,  mother_name, dob, gender,nationality,identity_type,present_address,locality,city_town_village,country,state,district,pincode,mobile,alt_mobile,email, uploadfile) VALUES('$name','$father_name','$mother_name','$dob','$gender','$nationality','$identity_type','$present_address','$locality','$city_town_village','$country','$state','$district','$pincode','$mobile','$alt_mobile','$email','$folder')";

    $data = mysqli_query($conn,$query);

    if ($data) {
      echo"<script>alert('Thank you For Sharing your Details! We will contact you soon.');
                  window.location.href='qs-career.php';
          </script>";

    }
    else
      echo "not inserted";
  }
  else{
    echo"<script>alert('please fill all fields');
                  window.location.href='qs-career.php';
          </script>";

  }
  }

?>

<!DOCTYPE html>

<html lang="en">

<?php include 'head.php';?>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
    <?php include 'header.php';?>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Store</a></li>
            <li class="active">Career</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Career</h1>
            <!-- BEGIN CHECKOUT PAGE -->
            

              <!-- BEGIN PAYMENT ADDRESS -->
              <div id="payment-address" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a>
                      Make Your Career now
                    </a>
                  </h2>
                </div>
                <div id="payment-address-content" >
                  <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
                      <h3>Your Personal Details</h3>
                      <form method="POST" action="qs-career.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="firstname">Name <span class="require">*</span></label>
                        <input type="text" id="name" name="name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="father_name">Father Name<span class="require">*</span></label>
                        <input type="text" id="father_name" name="father_name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="mother_name">Mother Name<span class="require">*</span></label>
                        <input type="text" id="mother_name" name="mother_name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="dob">Date Of Birth<span class="require">*</span></label>
                        <input type="date" id="dob" name="dob"  class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="gender">Gender <span class="require">*</span></label>
                        <select class="form-control input-sm" name="gender" id="gender">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" id="nationality" name="nationality" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="identity_type">Identity type</label>
                        <input type="text" id="identity_type" name="identity_type" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" name="uploadfile" type="file" id="formFile">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <h3>Your Address</h3>
                      <div class="form-group">
                        <label for="present_address">Present address</label>
                        <input type="text" id="present_address" name="present_address" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="locality">Locality<span class="require">*</span></label>
                        <input type="text" id="locality" name="locality" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="city_town_village">city/town/village</label>
                        <input type="text" id="city_town_village" name="city_town_village" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="country">Country <span class="require">*</span></label>
                        <input type="text" id="country" name="country" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="state">State<span class="require">*</span></label>
                        <input type="text" id="state" name="state" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="district">District<span class="require">*</span></label>
                        <input type="text" id="district" name="district" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="pincode">Pincode<span class="require">*</span></label>
                        <input type="text" id="pincode" name="pincode" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="mobile">Mobile No.<span class="require">*</span></label>
                        <input type="text" id="mobile" name="mobile" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="pincode">Altername Mobile no.<span class="require">*</span></label>
                        <input type="text" id="pincode" name="alt_mobile" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="email">Mail Id<span class="require">*</span></label>
                        <input type="email" id="email" name="email" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="submit"  value="Submit">
                      </div>
                      </form>
                    </div>
                    <hr>
                  </div>
                </div>
              </div>
              <!-- END PAYMENT ADDRESS -->

              
            
            <!-- END CHECKOUT PAGE -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

     <?php include 'footer.php';?>
</body>
<!-- END BODY -->


</html>