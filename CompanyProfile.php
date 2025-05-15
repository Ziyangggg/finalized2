<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Company Profile</title>
    <meta charset="UTF-8">
    <?php
      require_once('connect.php');
      include('company_session.php');
      $query=mysqli_query($connect,"SELECT * FROM Company_Info where CompanyID='$companyid' and is_deleted = '0'")or die(mysqli_error());
      $row=mysqli_fetch_array($query);
    ?>

    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-upwork'></i>
      <span class="logo_name">Company</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="CompanyDashboard.php" >
            <i class='bx bxs-dashboard'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="CompanyJobPosting.php">
            <i class='bx bxs-briefcase-alt-2'></i>
            <span class="links_name">Jobs </span>
          </a>
        </li>
        <li>
          <a href="CompanyApplicant.php">
            <i class='bx bxs-group'></i>
            <span class="links_name">Application</span>
          </a>
        </li>
       
        <li>
          <a href="CompanyReview.php">
            <i class='bx bxs-star'></i>
            <span class="links_name">Review</span>
          </a>
        </li>
        <li>
            <a href="CompanyProfile.php" class="active">
                <i class='bx bxs-buildings' ></i>
              <span class="links_name">Company Profile</span>
            </a>
        </li>



        <li class="log_out">
        <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <nav>
    <div class="sidebar-button">
      <i class='bx bx-menu sidebarBtn'></i>
      <span class="dashboard">Company Profile</span>
    </div>
    
    <div class="profile-details">
        <span class="admin_name"><?php echo $row["CompanyUsername"] ?></span>
        
      </div>
  </nav>
  
  <section class="home-section">
   

    <div class="home-content">
			<div class="all-boxes">
        <div class="title">Company Profile</div>
        <div class="applicant-boxes">
          <div class="recent-applicant">
          <div class="company-detail-wrapper">
          <form class="post-form-wrapper"  method="POST" autocomplete="off" enctype="multipart/form-data" >
        
              <div class="row gap-20">

                  
             
                
                <div class="col-sm-12 col-md-8">
                
                  <div class="form-group">
                    <label>Company Name</label>
                    <input name="name" placeholder="Enter company name" type="text" class="form-control"  value="<?php echo $row["CompanyName"]; ?>"required>
                  </div>
                  
                </div>

                <div class="col-sm-12 col-md-8">
                
                  <div class="form-group">
                    <label>Company Username</label>
                    <input name="username" placeholder="Enter company name" type="text" class="form-control"  value="<?php echo $row["CompanyUsername"]; ?>"required>
                  </div>
                  
                </div>

                <div class="col-sm-12 col-md-8">
                
                  <div class="form-group">
                      <label>Password</label>
                      <input class="form-control" placeholder="Enter Password" name="password" required type="password" value="<?php echo $row["CompanyPassword"]; ?>" required> 
                  </div>
                  
                </div>

                <div class="col-sm-12 col-md-8">
                
                  <div class="form-group">
                    <label>Company Address</label>
                    <input name="address" placeholder="Enter Company Address" type="text" class="form-control"  value="<?php echo $row["CompanyAddress"]; ?>"required>
                  </div>
                  
                </div>
                <div class="clear"></div>
                
                <div class="col-sm-6 col-md-4">
                
                  <div class="form-group">
                    <label>Registration Number</label>
                    <input name="registrationnumber" placeholder="Enter registration number" type="text" class="form-control"  value="<?php echo $row["CompanyRegistrationNo"]; ?>"required>
                  </div>
                  
                </div>
                
                <div class="col-sm-6 col-md-4">
                
                  <div class="form-group">
                    <label>Industry</label>
                     <input class="form-control" placeholder="Eg: Booking, Travel" name="industry" required type="text"  value="<?php echo $row["CompanyIndustry"]; ?>"required> 
                  </div>
                  
                </div>
                
                <div class="clear"></div>

                <div class="form-group">
                  
                  <div class="col-sm-6 col-md-4">
                    <label>Size</label>
                    <input type="text" class="form-control"  name="size" placeholder="Enter your website" value="<?php echo $row["CompanySize"]; ?>">
                     
                    </select>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <label>Website</label>
                    <input type="text" class="form-control"  name="web" placeholder="Enter your website" value="<?php echo $row["CompanyWebsite"]; ?>">
                  </div>
                    
                </div>
                
                

                <div class="clear"></div>
                
                <div class="col-sm-6 col-md-4">
                
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" pattern="[0-9]{10,11}" required class="form-control"  placeholder="Enter Phone Number Exp:0176899754" value="<?php echo $row["CompanyPhone"]; ?>">
                  </div>
                  
                </div>
                
                <div class="col-sm-6 col-md-4">
                
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" required class="form-control"  placeholder="Enter your email" value="<?php echo $row["CompanyEmail"]; ?>">
                  </div>
                  
                </div>
                


                <div class="clear"></div>
                


                <div class="clear"></div>
                
                <div class="col-sm-12 col-md-12">
                
                  <div class="form-group bootstrap3-wysihtml5-wrapper">
                    <label>Company Description</label>
                    <textarea name="description" class="bootstrap3-wysihtml5 form-control" placeholder="Enter company description ..." style="height: 200px;"><?php echo $row["CompanyDescription"]; ?></textarea>
                  </div>
                  
                </div>
                
                <div class="clear"></div>
                
                <div class="col-sm-12 col-md-12">
                
                  <div class="form-group bootstrap3-wysihtml5-wrapper">
                    <label>Company Our Team</label>
                    <textarea name="team" class="bootstrap3-wysihtml5 form-control" placeholder="Enter company services ..." style="height: 200px;"><?php echo $row["CompanyOurTeam"]; ?></textarea>
                  </div>
                  
                </div>
                
                <div class="clear"></div>
                
                <div class="col-sm-12 col-md-12">
                
                  <div class="form-group bootstrap3-wysihtml5-wrapper">
                    <label>Company Our Mission</label>
                    <textarea name="mission" class="bootstrap3-wysihtml5 form-control" placeholder="Enter company expertise ..." style="height: 200px;"><?php echo $row["CompanyOurMission"]; ?></textarea>
                  </div>
                  
                </div>

                <div class="col-sm-12 col-md-12">
                
                  <div class="form-group bootstrap3-wysihtml5-wrapper">
                    <label>Company Our Vision</label>
                    <textarea name="vision" class="bootstrap3-wysihtml5 form-control" placeholder="Enter company services ..." style="height: 200px;"><?php echo $row["CompanyOurVision"]; ?></textarea>
                  </div>
                  
                </div>
                
                <div class="clear"></div>

                <div class="col-sm-12 col-md-12">
												
                  <div class="form-group bootstrap3-wysihtml5-wrapper" >
                  <label>Company Logo</label>
                  <label><img src="data:image/jpeg;base64,<?php echo base64_encode($row['CompanyLogo']);?>" style="max-width:200px;max-height:200px;object-fit: contain;"></label>
                  <input accept="image/*" type="file" name="image" >

                  
                  
                  </div>
                        
                  </div>
                
                <div class="clear"></div>

                <div class="col-sm-12 mt-10"><br><br>
                  <button type="submit" class="btn btn-primary" name="submit" >Save</button>
                  
                </div>

              </div>
              
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  

</body>
</html>

<script src="script.js"></script>

<?php
	include("connect.php");
	$query=mysqli_query($connect,"SELECT * FROM Company_Info where CompanyID='$companyid'and is_deleted = '0'")or die(mysqli_error());
  $row=mysqli_fetch_array($query);
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$username = $_POST["username"];
    $address = $_POST["address"];
		$password = $_POST["password"];
    $registrationnumber = $_POST["registrationnumber"];
    $industry = $_POST["industry"];
    $size = $_POST["size"];
    $website = $_POST["web"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $description = $_POST["description"];
		$team = $_POST["team"];
    $mission = $_POST["mission"];
    $vision = $_POST["vision"];
    
    
    if(!empty($_FILES["image"]['tmp_name'])){
        $fileName= basename($_FILES["image"]['name']);
        $fileType= pathinfo($fileName,PATHINFO_EXTENSION);
        $allowTypes= array('jpg','png','jpeg','gif');
        if(in_array($fileType,$allowTypes)){
        $image= $_FILES['image']['tmp_name'];
        $imgContent=addslashes(file_get_contents($image));
        }
        $query = "UPDATE company_info SET CompanyUsername='$username',CompanyPassword='$password',CompanyName='$name'
        ,CompanyEmail='$email',CompanySize='$size',CompanyIndustry='$industry',CompanyRegistrationNo='$registrationnumber'
        ,CompanyDescription='$description',CompanyWebsite='$website',CompanyAddress='$address',CompanyPhone='$phone'
        ,CompanyOurTeam='$team',CompanyOurMission='$mission',CompanyOurVision='$vision',CompanyLogo='$imgContent' 
        WHERE CompanyID='$companyid'";
        $result = mysqli_query($connect,$query);

    }
    if(empty($imgContent)){
			$query = "UPDATE company_info SET CompanyUsername='$username',CompanyPassword='$password',CompanyName='$name'
        ,CompanyEmail='$email',CompanySize='$size',CompanyIndustry='$industry',CompanyRegistrationNo='$registrationnumber'
        ,CompanyDescription='$description',CompanyWebsite='$website',CompanyAddress='$address',CompanyPhone='$phone'
        ,CompanyOurTeam='$team',CompanyOurMission='$mission',CompanyOurVision='$vision'
        WHERE CompanyID='$companyid'";
        $result = mysqli_query($connect,$query);
		}
    
    
	?>
	
	<script>
		alert("Update Company Profile Done!");
    window.location.href="CompanyProfile.php";
	</script>
	
	<?php
	}
  ?>