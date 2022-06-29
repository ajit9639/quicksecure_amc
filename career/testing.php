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
<head>
  <title>Career</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->
  <style>
      *{
          margin:0px;
          padding:0px;
      }
      a{text-decoration:none!important;}
  </style>
</head>

<!-- Body BEGIN -->
<body class="ecommerce">
    
    <!-- Header END -->

    <div class="main" style="background:#642b73;">
         <ul class="breadcrumb alert alert-success font-weight-bold display-4">
            <li><a href="index.html">Home</a></li>
           &nbsp;&nbsp;>&nbsp;&nbsp;
            <li class="active">Career</li>
        </ul>
        
        
      <div class="container">
          
       
        
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
           
            <!-- BEGIN CHECKOUT PAGE -->
            

              <!-- BEGIN PAYMENT ADDRESS -->
              <div id="payment-address" class="panel panel-default">
               
                
                <div id="payment-address-content" >
                  <div class="panel-body row">
                    
                      <h3>Your Personal Details</h3>
                      <form method="POST" action="qs-career.php" enctype="multipart/form-data">
                          <div class="row">
                      <div class="col-md-4">
                        <label for="firstname">Name <span class="require">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
                      </div>
                      <div class="col-md-4">
                        <label for="father_name">Father Name<span class="require">*</span></label>
                        <input type="text" id="father_name" name="father_name" class="form-control" placeholder="Enter Father Name">
                      </div>
                      <div class="col-md-4">
                        <label for="mother_name">Mother Name<span class="require">*</span></label>
                        <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="Enter Mother Name">
                      </div>
                      <div class="col-md-4">
                        <label for="dob">Date Of Birth<span class="require">*</span></label>
                        <input type="date" id="dob" name="dob"  class="form-control">
                      </div>
                      <div class="col-md-4">
                        <label for="gender">Gender <span class="require">*</span></label>
                        <select class="form-control input-sm" name="gender" id="gender">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                      </div>
                      
                      
                      <div class="col-md-4">
                        <label for="nationality">Nationality</label>
                        <input type="text" id="nationality" name="nationality" class="form-control" placeholder="Enter Nationality">
                      </div>
                      <div class="col-md-4">
                        <label for="identity_type">Identity type</label>
                        <input type="text" id="identity_type" name="identity_type" class="form-control" placeholder="Enter Identity type">
                      </div>
                      <div class="col-md-4">
                        <label for="formFile" class="form-label">Upload Your Resume</label>
                        <input class="form-control" name="uploadfile" type="file" id="formFile">
                      </div>
                    
                    
                    
                    
                      
                      <div class="col-md-12">
                        <label for="present_address">Present address</label>
                        <!--<input type="text" id="present_address" name="present_address" class="form-control">-->
                        <textarea id="present_address" name="present_address" class="form-control" placeholder="Enter Your Present Address"></textarea>
                      </div>
                      <div class="col-md-4">
                        <label for="locality">Locality<span class="require">*</span></label>
                        <input type="text" id="locality" name="locality" class="form-control" placeholder="Enter Your Locality">
                      </div>
                      <div class="col-md-4">
                        <label for="city_town_village">City / Town / Village</label>
                        <input type="text" id="city_town_village" name="city_town_village" class="form-control" placeholder="Enter Your City/Town/Village">
                      </div>
                      <div class="col-md-4">
                        <label for="country">Country <span class="require">*</span></label>
                        <input type="text" id="country" name="country" class="form-control" placeholder="Enter Your Country">
                      </div>
                      <div class="col-md-4">
                        <label for="state">State<span class="require">*</span></label>
                        <input type="text" id="state" name="state" class="form-control" placeholder="Enter Your State">
                      </div>
                      <div class="col-md-4">
                        <label for="district">District<span class="require">*</span></label>
                        <input type="text" id="district" name="district" class="form-control"  placeholder="Enter Your District">
                      </div>
                      <div class="col-md-4">
                        <label for="pincode">Pincode<span class="require">*</span></label>
                        <input type="text" id="pincode" name="pincode" class="form-control"  placeholder="Enter Your Pincode">
                      </div>
                      <div class="col-md-4">
                        <label for="mobile">Mobile No.<span class="require">*</span></label>
                        <input type="text" id="mobile" name="mobile" class="form-control"  placeholder="Enter Your Mobile No.">
                      </div>
                      <div class="col-md-4">
                        <label for="pincode">Altername Mobile no.<span class="require">*</span></label>
                        <input type="text" id="pincode" name="alt_mobile" class="form-control"  placeholder="Enter Your Altername Mobile no.">
                      </div>
                      <div class="col-md-4">
                        <label for="email">Email Id<span class="require">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email Id">
                      </div>
                      <div class="col-md-4">
                        <input type="submit" name="submit"  value="Submit" class="btn btn-success mt-4">
                      </div>
                      </form>
                    </div>
                    <hr>
                  </div>
                </div>
              </div>
              <!-- END PAYMENT ADDRESS -->
</div>
              
            
            <!-- END CHECKOUT PAGE -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

     
</body>
<!-- END BODY -->


</html>