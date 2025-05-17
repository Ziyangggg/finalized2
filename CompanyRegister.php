<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="login">
  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="wallhaven-4y3370.jpg" alt="">
        <div class="text">
          <span class="text-1">Lets get your Job Now</span>

        </div>
      </div>

    </div>
    <div class="forms">
        
        <div class="form-content">
        <div class="signup-form">
          <div class="title">Company Sign Up</div>
          <form class="post-form-wrapper"  method="POST" autocomplete="off" enctype="multipart/form-data">
        
            <div class="row gap-20">
              <div class="clear"></div>
              
              <div class="col-sm-12 col-md-8">
              
                <div class="form-group">
                  <label>Company Name</label>
                  <input name="companyname" placeholder="Enter your company name" type="text" class="form-control"  required>
                </div>

                <div class="form-group">
                    <label>Company Username</label>
                    <input name="companyusername" placeholder="Enter your company username" type="text" class="form-control"  required>
                  </div>
              </div>

              <div class="form-group">
                    <label>Password</label>
                    <input name="password" placeholder="Enter your company password" class="form-control" required type="password" required>
                  </div>

              <div class="col-sm-12 col-md-8">
              
                <div class="form-group">
                  <label>Company Address</label>
                  <input name="address" placeholder="Enter your company address" type="text" class="form-control"  required>
                </div>
                
              </div>
              <div class="clear"></div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Registration Number</label>
                  <input name="registrationnumber" placeholder="Enter your registration number" type="text" class="form-control"  required>
                </div>
                
              </div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Industry</label>
                   <input class="form-control" placeholder="Eg: Booking, Travel" name="industry" required type="text"  required> 
                </div>
                
              </div>
              
              <div class="clear"></div>

              <div class="form-group">
                
                <div class="col-sm-6 col-md-4">
                  <label>Size</label>
                  <input name="size" required class="selectpicker show-tick form-control mb-15" required type="number" placeholder="Enter your company size" required>
                </div>

                <div class="col-sm-6 col-md-4">
                  <label>Website</label>
                  <input type="text" class="form-control"  name="website" placeholder="Enter your company website" >
                </div>
                  
              </div>
              
              

              <div class="clear"></div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="tel" name="phone" pattern="[0-9]{10,11}" placeholder="Enter Phone Number Exp:0176899754"  class="form-control"  placeholder="Enter your company phone"required>
                </div>
                
              </div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" name="email"  class="form-control"  placeholder="Enter your company email"required>
                </div>
                
              </div>
              


              <div class="clear"></div>
              


              <div class="clear"></div>
              
              <div class="col-sm-12 col-md-12">
              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                  <label>Company Description</label>
                  <textarea name="description" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your company description ..." style="height: 200px;"require></textarea>
                </div>
                
              </div>
              
              <div class="clear"></div>
              
              <div class="col-sm-12 col-md-12">
              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                  <label>Company Our Team</label>
                  <textarea name="team" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your company services ..." style="height: 200px;"require></textarea>
                </div>
                
              </div>
              
              <div class="clear"></div>
              
              <div class="col-sm-12 col-md-12">
              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                  <label>Company Our Mission</label>
                  <textarea name="mission" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your company expertises ..." style="height: 200px;" require></textarea>
                </div>
                
              </div>

              <div class="col-sm-12 col-md-12">
              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                  <label>Company Our Vision</label>
                  <textarea name="vision" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your company services ..." style="height: 200px;" require></textarea>
                </div>
                
              </div>
              
              <div class="clear"></div>

              <div class="col-sm-12 col-md-12">
                                              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                <label>Company Logo</label>
                <input accept="image/*" type="file" name="image"  required >
                </div>
                      
                </div>
              
              <div class="clear"></div>



            </div>
            <div class="button input-box">
                <input type="submit" value="Sumbit" name="submit">
              </div>
              <div class="text sign-up-text">Already have an account? <a href="CompanyLogin.php">Login now</a></div>
            </div>
          </form>
            
     
    </div>
    </div>
    </div>
  </div>
</div>
</body>
</html>

<?php
	include("connect.php");
	
	if(isset($_POST["submit"]))
	{
		$name = $_POST["companyname"];
		$username = $_POST["companyusername"];
    $address = $_POST["address"];
		$password = $_POST["password"];
    $registrationnumber = $_POST["registrationnumber"];
    $industry = $_POST["industry"];
    $size = $_POST["size"];
    $website = $_POST["website"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $description = $_POST["description"];
		$team = $_POST["team"];
    $mission = $_POST["mission"];
    $vision = $_POST["vision"];
    $imgContent = null;

    // 处理图片上传（可选）
    if (!empty($_FILES["image"]['tmp_name'])) {
        $fileName = basename($_FILES["image"]['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array(strtolower($fileType), $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image); // 注意：不加 addslashes
        }
    }

    if ($imgContent !== null) {
        $sql = "INSERT INTO finalyearproject.company_info 
            (CompanyUsername, CompanyPassword, CompanyName, CompanyEmail, CompanySize, CompanyIndustry, 
             CompanyRegistrationNo, CompanyDescription, CompanyWebsite, CompanyAddress, CompanyPhone, 
             CompanyOurTeam, CompanyOurMission, CompanyOurVision, CompanyLogo, is_deleted)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0')";

        $params = array(
                array($username, SQLSRV_PARAM_IN),
                array($password, SQLSRV_PARAM_IN),
                array($name, SQLSRV_PARAM_IN),
                array($email, SQLSRV_PARAM_IN),
                array($size, SQLSRV_PARAM_IN),
                array($industry, SQLSRV_PARAM_IN),
                array($registrationnumber, SQLSRV_PARAM_IN),
                array($description, SQLSRV_PARAM_IN),
                array($website, SQLSRV_PARAM_IN),
                array($address, SQLSRV_PARAM_IN),
                array($phone, SQLSRV_PARAM_IN),
                array($team, SQLSRV_PARAM_IN),
                array($mission, SQLSRV_PARAM_IN),
                array($vision, SQLSRV_PARAM_IN),
                array($imgContent, SQLSRV_PARAM_IN, SQLSRV_PHPTYPE_STREAM(SQLSRV_ENC_BINARY), SQLSRV_SQLTYPE_VARBINARY('max'))
            );
        // $params = array($username, $password, $name, $email, $size, $industry, $registrationnumber,
        //                 $description, $website, $address, $phone, $team, $mission, $vision, $imgContent);

    } else {
        $sql = "INSERT INTO finalyearproject.company_info 
            (CompanyUsername, CompanyPassword, CompanyName, CompanyEmail, CompanySize, CompanyIndustry, 
             CompanyRegistrationNo, CompanyDescription, CompanyWebsite, CompanyAddress, CompanyPhone, 
             CompanyOurTeam, CompanyOurMission, CompanyOurVision, is_deleted)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0')";

        $params = array($username, $password, $name, $email, $size, $industry, $registrationnumber,
                        $description, $website, $address, $phone, $team, $mission, $vision);
    }

    $stmt = sqlsrv_query($connect, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_close($connect);
  //   if(!empty($_FILES["image"]['tmp_name'])){
  //     $fileName= basename($_FILES["image"]['name']);
  //     $fileType= pathinfo($fileName,PATHINFO_EXTENSION);
  //     $allowTypes= array('jpg','png','jpeg','gif');
  //     if(in_array($fileType,$allowTypes)){
  //     $image= $_FILES['image']['tmp_name'];
  //     $imgContent=addslashes(file_get_contents($image));
  //     }
  //     $query = "INSERT INTO company_info(CompanyUsername,CompanyPassword,CompanyName,CompanyEmail,CompanySize,CompanyIndustry,CompanyRegistrationNo,CompanyDescription,CompanyWebsite,CompanyAddress,CompanyPhone,CompanyOurTeam,CompanyOurMission,CompanyOurVision,CompanyLogo,is_deleted)
	// 	  VALUES('$username','$password','$name','$email','$size','$industry','$registrationnumber','$description','$website','$address','$phone','$team','$mission','$vision','$imgContent','0')";
		
  //     $result = mysqli_query($connect,$query);

  //   }

  //   if(empty($imgContent)){
  //     $query = "INSERT INTO company_info(CompanyUsername,CompanyPassword,CompanyName,CompanyEmail,CompanySize,CompanyIndustry,CompanyRegistrationNo,CompanyDescription,CompanyWebsite,CompanyAddress,CompanyPhone,CompanyOurTeam,CompanyOurMission,CompanyOurVision,,is_deleted)
	// 	  VALUES('$username','$password','$name','$email','$size','$industry','$registrationnumber','$description','$website','$address','$phone','$team','$mission','$vision','0')";
		
  //       $result = mysqli_query($connect,$query);
	// 	}
	// mysqli_close($connect);
	
	?>
	
	<script>
		alert("Add Company Profile Done!");
	</script>
	
	<?php
	}