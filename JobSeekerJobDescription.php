<?php
include ("Jobseeker_session.php");
$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row38=sqlsrv_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <head>
    <title>Job Description</title>
    <link rel="stylesheet" href="style.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
</head>
<body>
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
        <span class="dashboard">Job Description</span>
      </div>
  
      
  
      <div class="profile-details">
        <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?></span>
        
      </div>
    </nav>
    <section class="home-section">
   

			<div class="home-content">
					<?php
					$jobid=htmlentities($_GET["jid"]);
					$query = "select * from finalyearproject.joblisting where JobListingID='$jobid' and is_deleted = '0'";
					$result = sqlsrv_query($connect,$query);
					if($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
					{
					$new = $row['CompanyID'];
					$sql2 = "select * from finalyearproject.company_info WHERE CompanyID = '$new' and is_deleted = '0'";
					$result2 = sqlsrv_query($connect,$sql2);
					$row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
					if(is_array($row2)){

					$new2 = $row['JobCategoryID'];
					$sql3 = "select * from finalyearproject.jobcategory WHERE JobCategoryID = '$new2' and is_deleted = '0'";
					$result3 = sqlsrv_query($connect,$sql3);
					$row3 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
					if(is_array($row3)){


					?>
			  	<div class="all-boxes">
						<div class="title">Job Description</div>
						<div class="applicant-boxes">
							<div class="description-boxes">
								<div class="boxes">

										<div class="description-card">
											<div class="img">
											<img src="data:image/jpeg;base64,<?php echo base64_encode($row2['CompanyLogo']);?>" style="max-width:200px;max-height:200px;">
											</div>

											<h2><?php echo $row["JobTitle"]; ?></h2>

											<div class="Job-Description">
												<h3>Company</h3>
												<p><li><?php echo $row2["CompanyName"]; ?></li></p>
												<h3>Job Description</h3>
												<p><li><?php echo $row["JobDescription"]; ?></li></p>
												<h3>Job Requirement</h3>
												<p><li><?php echo $row["JobRequirement"]; ?></li></p>

												<h3>Job Type</h3>
												<p><li><?php echo $row["JobType"]; ?></li></p>
												<h3>Job Category</h3>
												<p><li><?php echo $row3["JobCategoryName"]; ?></li></p>
												<h3>Location:</h3>
												<p><li><?php echo $row["JobLocation"]; ?></li></p>
												<h3>Salary:</h3>
												<p><li>RM: <?php echo $row["JobSalary"]; ?></li></p>
												<h3>Company Registration No.</h3>
												<p><li><?php echo $row2["CompanyRegistrationNo"]; ?></li></p>
											</div>

										
											
											
											<a href="JobSeekerJobDescription.php?apply&jid=<?php echo $jobid; ?>&cid=<?php echo $new; ?>">Apply</a>
												<a href="JobSeekerJobDescription.php?favourite&jid=<?php echo $jobid; ?>&cid=<?php echo $new; ?>">Favourite</a>
												<a href="JobSeekerReport.php?joblistingid=<?php echo $jobid;?>">Report Job</a>
											
										</div>
								</div>
								
							</div>  
							<div class="title">Similar Job</div>
							<div class="similarjob">
							
            		<div class="similarboxes">
						<?php
							$query = "select * from finalyearproject.JobListing WHERE JobCategoryID='$new2' AND is_deleted = '0' ORDER BY JobListingID DESC LIMIT 8 ";
							$result = sqlsrv_query($connect,$query);
							while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ){

								$new = $row['CompanyID'];
								$sql2 = "select * from finalyearproject.company_info WHERE CompanyID = '$new' and is_deleted = '0'";
								$result2 = sqlsrv_query($connect,$sql2);
								$row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
								if(is_array($row2)){
						?>
						<div class="box">
							<?php $abc = $row['JobListingID'];
								  
							
							?>
							<div class="img">
							<img src="data:image/jpeg;base64,<?php echo base64_encode($row2['CompanyLogo']);?>" style="max-width:200px;max-height:200px;">
							</div>
							<div class="1">
							<div class="jobtitle">
								<a href="JobSeekerJobDescription.php?jid=<?php echo $abc;?>"><?php echo $row["JobTitle"]; ?></a>
							</div>
							<div class="company">
								<b>Company :</b>
								<b><a href="#"><?php echo $row2["CompanyName"]; ?></a></b>
								
							</div>
							<div class="Location">
								<b>Location: </b><?php echo $row["JobLocation"]; ?>
							</div>
							<div class="Salary">
								<b>Salary: RM </b><?php echo $row["JobSalary"]; ?>
							</div>
							
							</div>
						</div>
						<?php
							}
						}
							?>
            		</div>
          		</div>	
						</div>
					</div>

				</div>
				
			</div>
      <?php
      }
    }
  }
    ?>
		  </section>	
</body>
</html>
<main>
<?php
										
									
									
	if(isset($_GET['apply']))
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date=date('d/m/Y H:i:s');
		$jid=$_GET['jid'];
		$cid=$_GET['cid'];
		$jobseekerid = $_SESSION["jobseekerid"];

		$sql66 = "SELECT * FROM finalyearproject.resume_jobseeker WHERE Job_SeekerID = '$jobseekerid'";
		$result666 = sqlsrv_query($connect, $sql66);
		$row6 = sqlsrv_fetch_array($result666, SQLSRV_FETCH_ASSOC);
		if(is_array($row6)){ 

			$sql5 = "SELECT * from finalyearproject.application WHERE CompanyID = '$cid' AND Job_SeekerID = '$jobseekerid' AND JobListingID = '$jid'";
			$result5 = sqlsrv_query($connect,$sql5);
			$row8 = sqlsrv_fetch_array($result5, SQLSRV_FETCH_ASSOC);
			if(is_array($row8)){ 
			echo "<script type='text/javascript'>
			window.location.href='JobSeekerJobListing.php';
				alert('You Had Applied for this job!');
			</script>";
			}
		else{
		
			$query = "INSERT INTO finalyearproject.application(DateApplied,ApplicationStatus,Job_SeekerID,CompanyID,JobListingID)
			VALUES('$date','In Progress','$jobseekerid','$cid','$jid')";
			$result = sqlsrv_query($connect,$query);
?>
			<script type='text/javascript'>
				window.location.href="JobSeekerJobListing.php";alert("Apply Done!");
			</script>
<?php
				
}
}else{
	echo "<script type='text/javascript'> 
			window.location.href='JobSeekerJobListing.php';
					alert('Please Build Up Your CV First');
			</script>";
}
	}
if(isset($_GET['favourite']))
{
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date=date('d/m/Y H:i:s');
	$jid=$_GET['jid'];
	$cid=$_GET['cid'];
	$jobseekerid = $_SESSION["jobseekerid"];

	$sql9 = "SELECT * from finalyearproject.favourite WHERE Job_SeekerID = '$jobseekerid' AND JobListingID = '$jid'";
	$result6 =sqlsrv_query($connect,$sql9);
	$row7 = sqlsrv_fetch_array($result6, SQLSRV_FETCH_ASSOC);
	if(is_array($row7)){ 
	echo "<script type='text/javascript'>
	window.location.href='JobSeekerJobListing.php';
		alert('You Had Added This Job To Favourite!');
	</script>";
	}
	else{			
		$query0 = "INSERT INTO finalyearproject.favourite(Job_SeekerID,JobListingID)
		VALUES('$jobseekerid','$jid')";
		$result0 = sqlsrv_query($connect,$query0);
?>
		<script type='text/javascript'>
			window.location.href="JobSeekerJobListing.php";
			alert("Add To Favourite Done!");
		</script>
		<?php
	}
}		
?>
<script src="script.js"></script>