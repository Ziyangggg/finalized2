<?php
include("Jobseeker_session.php");
require_once('connect.php');
$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row38=sqlsrv_fetch_array($query);
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

<head>
	<title>Report Submission Page</title>
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
			  <span class="dashboard">Report History</span>
			</div>
		
			
		
			<div class="profile-details">
			  <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?></span>
			  
			</div>
		  </nav>

		  <section class="home-section">
   

			<div class="home-content">
				<div class="all-boxes">
				<div class="title">Report History </div>
				<div class="applicant-boxes">
				  <div class="recent-applicant">
					


						<div class="table">
							<table>																
								<thead>
									<tr>
										<th>Report ID</th>
										<th>Date Reported</th>
										<th>Reported Job ID</th>
										<th>Reported Job</th>
										<th>Company ID</th>
										<th>Job Company</th>
										<th>Reason for Report</th>
										
									</tr>
								</thead>
								<tbody>
									<?php
										$jobseekerid = $_SESSION["jobseekerid"];
										$query = "select * from finalyearproject.report WHERE Job_SeekerID = $jobseekerid order by ReportID DESC";
										$result = sqlsrv_query($connect,$query);
										while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
										{
											$new = $row['JobListingID']; 
											$sql2 = "select * from finalyearproject.joblisting WHERE JobListingID = '$new' and is_deleted = '0'";
											$result2 = sqlsrv_query($connect,$sql2);
											$row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
											if(is_array($row2)){

											$new3 = $row2['CompanyID']; 
											$sql4 = "select * from finalyearproject.company_info WHERE CompanyID = '$new3'and is_deleted = '0'";
											$result4 = sqlsrv_query($connect,$sql4);
											$row4 = sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC);
											if(is_array($row4)){
									?>
								<tr>
									<td><?php echo $row['ReportID']; ?></td>
									<td><?php echo $row['Date_Reported']; ?></td>
									<td><?php echo $row2['JobListingID']; ?></td>
									<td><?php echo $row2['JobTitle']; ?></td>
									<td><?php echo $row4['CompanyID']; ?></td>
									<td><?php echo $row4['CompanyName']; ?></td>
									<td><?php echo $row['Reason_for_report']; ?></td>
            					</tr>
									<?php
											}
										}
									}
									?>
								</tbody>
							</table>
						</div>
					
				  </div>
				</div>
			  </div>
			</div>
		
		  </section>
</body>
</html>



<script src="script.js"></script>

