<?php
include ("Jobseeker_session.php");
require_once('connect.php');
$query=mysqli_query($connect,"SELECT * FROM job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(mysqli_error());
$row38=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<html>
<head>
	<title>Job Seeker Website</title>
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
			  <span class="dashboard">Job Listing</span>
			</div>
		
			
			<form class="search-box" method="get" action="JobSeekerJobListing.php">
				<input type="text" name="search" placeholder="Search...">
			</form>
			
		
			<div class="profile-details">
			  <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?></span>
			  
			</div>
		  </nav>

		  <section class="home-section">
			<div class="home-content">
				<div class="all-boxes">
			  		<div class="title">Job Listing</div>
			  		
						<div class="applicant-boxes">
							<div class="description-boxes">
								<form method="post">
									<div class="listing-boxes">
											<div class="left">
												<?php
												$sql = "SELECT * FROM joblisting WHERE is_deleted='0' ";
												if(isset($_GET['search'])) {
													$search = $_GET['search'];
													$sql .= " AND JobTitle LIKE '%$search%' AND is_deleted='0' OR JobType LIKE '%$search%' AND is_deleted='0' ";
													$sql .= " OR JobLocation LIKE '%$search%' AND is_deleted='0' ";
												}
												$result = mysqli_query($connect, $sql);
												
												while($row = mysqli_fetch_assoc($result))
												{
												$eee = $row['JobListingID'];
												$new = $row['CompanyID']; 
												$sql2 = "select * from company_info WHERE CompanyID = '$new' AND is_deleted='0'";
												$result2 = mysqli_query($connect,$sql2);
												$row2 = mysqli_fetch_assoc($result2);
												if(is_array($row2)){ 
												?>
												<div class="job-card">
													<div class="img">
													<img src="data:image/jpeg;base64,<?php echo base64_encode($row2['CompanyLogo']);?>" style="max-width:200px;max-height:200px; object-fit: contain;">
													</div>
													<div class="content">
														<h2 ><a href="JobSeekerJobDescription.php?jid=<?php echo $eee;?>"><?php echo $row["JobTitle"]; ?></a></h2>
														<p><b>Company:</b> <?php echo $row2["CompanyName"]; ?></p>
														<p><b>Location:</b> <?php echo $row["JobLocation"]; ?></p>
														<p><b>Salary: RM </b> <?php echo $row["JobSalary"]; ?></p>
														<div class="action">
														
														<a href="JobSeekerJobListing.php?apply&jid=<?php echo $eee; ?>&cid=<?php echo $new; ?>">Apply</a>
														<a href="JobSeekerJobListing.php?favourite&jid=<?php echo $eee; ?>&cid=<?php echo $new; ?>">Favourite</a>
														<a href="JobSeekerReport.php?joblistingid=<?php echo $eee;?>">Report Job</a>
														
													</div>
													</div>
													
												</div>
												<?php
												
														}
														
												
												}
												?>
												
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
	if(isset($_GET['apply']))
	{	
		
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date=date('d/m/Y H:i:s');
		$jid=$_GET['jid'];
		$cid=$_GET['cid'];
		$jobseekerid = $_SESSION["jobseekerid"];	

		$sql66 = "SELECT * FROM resume_jobseeker WHERE Job_SeekerID = '$jobseekerid'";
		$result666 = mysqli_query($connect, $sql66);
		$row6 = mysqli_fetch_assoc($result666);
		if(is_array($row6)){ 
			
			$sql5 = "SELECT * from application WHERE CompanyID = '$cid' && Job_SeekerID = '$jobseekerid' && JobListingID = '$jid'";
			$result5 = mysqli_query($connect,$sql5);
			$row8 = mysqli_fetch_assoc($result5);
			if(is_array($row8)){ 
			echo "<script type='text/javascript'>
			window.location.href='JobSeekerJobListing.php';
				alert('You Had Applied for this job!');
			</script>";
			}
		else{
		
		$query = "INSERT INTO application(DateApplied,ApplicationStatus,Job_SeekerID,CompanyID,JobListingID)
		VALUES('$date','In Progress','$jobseekerid','$cid','$jid')";
		$result = mysqli_query($connect,$query);
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

			$sql9 = "SELECT * from favourite WHERE Job_SeekerID = '$jobseekerid' && JobListingID = '$jid'";
			$result6 = mysqli_query($connect,$sql9);
			$row7 = mysqli_fetch_assoc($result6);
			if(is_array($row7)){ 
			echo "<script type='text/javascript'>
			window.location.href='JobSeekerJobListing.php';
				alert('You Had Added This Job To Favourite!');
			</script>";
			}
			else{			
				$query0 = "INSERT INTO favourite(Job_SeekerID,JobListingID)
				VALUES('$jobseekerid','$jid')";
				$result0 = mysqli_query($connect,$query0);
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