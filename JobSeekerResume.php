<?php
include("Jobseeker_session.php");
require_once('connect.php');
$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.resume_jobseeker where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row=sqlsrv_fetch_array($query);

$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row38=sqlsrv_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>
	<title>Resume Editor</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
      	  <i class='#' ></i>
		  <span class="logo_name">Job Seekeer</span>
		</div>
		  <ul class="nav-links">
			<li>
			  <a href="JobSeekerProfile.php" >
         	  <i class='bx bxs-user-detail' ></i>				
			  <span class="links_name">Profile</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerAboutUs.php" >
        	  <i class='bx bxs-user-account' ></i>				
			  <span class="links_name">About Us</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerJobListing.php">
        	  <i class='bx bx-list-ul' ></i>				  
			  <span class="links_name">Job Listing</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerCompanyListing.php">
			  <i class='bx bx-list-ul' ></i>				  
			  <span class="links_name">Company Listing</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerFavourite.php">
        	  <i class='bx bxs-bookmark' ></i>
          	  <span class="links_name">Favourite</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerApplication.php">
              <i class='bx bxs-business'></i>
              <span class="links_name">Application</span>
			  </a>
			</li>
		   
			<li>
			  <a href="JobSeekerReportHistory.php">
          	  <i class='bx bxs-time'></i>
          	  <span class="links_name">History Report</span>
			  </a>
			</li>

      		<li>
			  <a href="JobSeekerMessage.php">
          	  <i class='bx bxs-chat' ></i>
			  <span class="links_name">Message</span>
			  </a>
			</li>
      		<li>
			  <a href="JobSeekerResume.php">
          	  <i class='bx bx-paperclip'></i>
			  <span class="links_name">Resume</span>
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
			  <span class="dashboard">Resume</span>
			</div>
		
			
		
			<div class="profile-details">
			  <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?></span>
			  
			</div>
		  </nav>
		  <section class="home-section">
   




			<div class="home-content">
					<div class="all-boxes">
				<div class="title">Job Seeker Resume</div>
				<div class="applicant-boxes">
				  <div class="recent-applicant">
				  <div class="company-detail-wrapper">
				  <form class="post-form-wrapper"  method="POST" autocomplete="off">
				
					  <div class="row gap-20">
						<div class="clear"></div>
						<div class="col-sm-12 col-md-8">
						
						  <div class="form-group">
							<label>Name</label>
							<input name="name" placeholder="Enter your name" type="text" class="form-control"<?php if(isset($row['ResumeID'])){?> value="<?php echo $row["Job_SeekerFullname"]; ?>"<?php } ?> required>
						  </div>
						  
						</div>
						
						<div class="clear"></div>
		
						<div class="col-sm-12 col-md-8">
						
						  <div class="form-group">
							<label>Address</label>
							<input name="address" placeholder="Enter your address" type="text" class="form-control" <?php if(isset($row['ResumeID'])){?> value="<?php echo $row["Job_SeekerAddress"]; ?>"<?php } ?> required>
						  </div>
						  
						</div>
						<div class="clear"></div>
						
						<div class="col-sm-6 col-md-4">
						
						  <div class="form-group">
							<label>Race</label>
							<input name="race" placeholder="Enter your race" type="text" class="form-control" <?php if(isset($row['ResumeID'])){?>value="<?php echo $row["Job_SeekerRace"]; ?>"<?php } ?> required >
						  </div>
						  
						</div>
						
						<div class="col-sm-6 col-md-4">
						
							<div class="form-group">
							  <label>Phone Number</label>
							  <input type="tel" name="phonenumber" pattern="[0-9]{10,11}"  class="form-control"  placeholder="Enter Phone Number Exp:0176899754" <?php if(isset($row['ResumeID'])){?> value="<?php echo $row["Job_SeekerPhone"]; ?>"<?php } ?>required>
							</div>
							
						  </div>
						
						
						<div class="clear"></div>

						
						
		
						<div class="clear"></div>
						
						
						<div class="col-sm-6 col-md-4">
						
						  <div class="form-group">
							<label>Email Address</label>
							<input type="email" name="emailaddress"  class="form-control"  placeholder="Enter your email address " <?php if(isset($row['ResumeID'])){?> value="<?php echo $row["Job_SeekerEmail"]; ?>"<?php } ?> required>
						  </div>
						  
						</div>
						<div class="col-sm-6 col-md-4">
						
							<div class="form-group">
							  <label>Education</label>
							  <input type="text" name="education"  class="form-control"  placeholder="Enter your education" <?php if(isset($row['ResumeID'])){?> value="<?php echo $row["Job_SeekerEducation"]; ?>"<?php } ?>required>
							</div>
							
						  </div>
						
		
		
						<div class="clear"></div>
						
		
		
						<div class="clear"></div>
						
						<div class="col-sm-12 col-md-12">
						
						  <div class="form-group bootstrap3-wysihtml5-wrapper">
							<label>Summary</label>
							<textarea name="summary" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your summary ..." style="height: 200px;"required ><?php if(isset($row['ResumeID'])){?><?php echo $row["Job_SeekerSummary"]; ?><?php } ?></textarea>
						  </div>
						  
						</div>
						
						<div class="clear"></div>
						
						<div class="col-sm-12 col-md-12">
						
						  <div class="form-group bootstrap3-wysihtml5-wrapper">
							<label>Work Experience</label>
							<textarea name="workexperience" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your work experience ..." style="height: 200px;"><?php if(isset($row['ResumeID'])){?><?php echo $row["Job_SeekerExperience"]; ?><?php } ?></textarea>
						  </div>
						  
						</div>
						
						<div class="clear"></div>
						
						<div class="col-sm-12 col-md-12">
						
						  <div class="form-group bootstrap3-wysihtml5-wrapper">
							<label>Language</label>
							<textarea name="language" class="bootstrap3-wysihtml5 form-control" placeholder="Enter language you know ..." style="height: 200px;"required><?php if(isset($row['ResumeID'])){?><?php echo $row["Job_SeekerLanguage"]; ?><?php } ?></textarea>
						  </div>
						  
						</div>
		
						<div class="col-sm-12 col-md-12">
						
						  <div class="form-group bootstrap3-wysihtml5-wrapper">
							<label>Skills</label>
							<textarea name="skills" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your skills ..." style="height: 200px;"required><?php if(isset($row['ResumeID'])){?><?php echo $row["Job_SeekerSkill"]; ?><?php } ?></textarea>
						  </div>
						  
						</div>
						
						<div class="clear"></div>

						<div class="col-sm-12 col-md-12">
												
						<div class="form-group bootstrap3-wysihtml5-wrapper">
						
						</form>
						</div>
								
						</div>
		

		
						<div class="col-sm-12 mt-10"><br><br>
						  <button type="submit" class="btn btn-primary" name="submit">Save</button>
						  <a class="btn btn-primary" name="print" href="printpdf.php?resumeid=<?php echo $row["ResumeID"]; ?>">Print Resume</a>
						</div>
		
					  </div>
					  
					</form>
				  </div>
				  </div>
				</div>
			  </div>
			</div>
		
		  </section>	  
            
			</div>
</body>
</html>

<?php
	include("connect.php");
	
	if(isset($_POST["submit"]))
	{ 	
		$query = "DELETE FROM finalyearproject.resume_jobseeker WHERE Job_SeekerID=$jobseekerid";
		$result = sqlsrv_query($connect, $query);
		
		$name = trim($_POST["name"]);
		$address = trim($_POST["address"]);
		$race = trim($_POST["race"]);
		$phonenumber = trim($_POST["phonenumber"]);
		$emailaddress = trim($_POST["emailaddress"]);
		$education = trim($_POST["education"]);
		$summary = trim($_POST["summary"]);
		$workexperience = trim($_POST["workexperience"]);
		$language = trim($_POST["language"]);
		$skills = trim($_POST["skills"]);
		$jobseekerid = $_SESSION["jobseekerid"];

		if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
			exit("Invalid email address.");
		}
		
		$query = "INSERT INTO finalyearproject.resume_jobseeker (Job_SeekerFullname, Job_SeekerEmail, Job_SeekerPhone, Job_SeekerAddress, Job_SeekerRace, Job_SeekerExperience, Job_SeekerEducation, Job_SeekerLanguage, Job_SeekerSkill, Job_SeekerSummary, Job_SeekerID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$params = [$name, $emailaddress, $phonenumber, $address, $race, $workexperience, $education, $language, $skills, $summary, $jobseekerid];
		$result = sqlsrv_query($connect, $query, $params);

		if ($result === false) {
			error_log(print_r(sqlsrv_errors(), true)); // Don't show errors to users
			exit("Database error.");
		}

		sqlsrv_close($connect);
	
	?>
	
	<script>
		alert("Add Resume Done!");

                window.location.href="JobSeekerResume.php";
            
	</script>
	
	<?php
	}

	?>
	<script src="script.js"></script>