<?php
include("Jobseeker_session.php");
$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row38=sqlsrv_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Jobseeker Add Feedback</title>
    <meta charset="UTF-8">
    

    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
			  <a href="#">
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
      <span class="dashboard">Feedback</span>
    </div>


    <div class="profile-details">
      <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?> ?></span>
      
    </div>
  </nav>
  <section class="home-section">
   









    <div class="home-content">
     
      <div class="all-boxes">
      <div class="title">Feedback</div>
      <div class="applicant-boxes">
        <div class="recent-applicant">
            <div class="company-detail-wrapper">
              <form class="post-form-wrapper"  method="POST" autocomplete="off">


                    <div class="col-sm-12 col-md-8">
                    
                      <div class="form-group">
                        <label>Feedback Score</label>
                        <select input type="feedbackscore" id="score" name="score"  required>
                        <option value="Give a feedback score" disabled selected></option>
                        <option value="5">5 </option>
                        <option value="4">4 </option>
                        <option value="3">3 </option>
                        <option value="2">2 </option>
                        <option value="1">1 </option>
				                </select>
                      </div>
                      
                    </div>

                    <div class="clear"></div>
                    
                    <div class="col-sm-12 col-md-8">
                    
                      <div class="form-group">
                        <label>Feedback Comments</label>
                        <textarea type="text" name="comments" required class="form-control"  placeholder="Enter your feedback comments" style="height:200px;"></textarea>
                      </div>
                      
                    </div>
                    <div class="clear"></div>
                    

                    

                    <div class="col-sm-15 md-10">
                      <button type="submit" class="btn btn-primary" name="submit">Save</button>
                      <button type="reset" class="btn btn-warning">Cancel</button>
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
	
	
	if(isset($_POST["submit"]))
	{ 
    
    date_default_timezone_set("Asia/Kuala_Lumpur");
		$date=date('d/m/Y H:i:s');
		
		$fullname = trim($_POST["fullname"]);
		$comments = trim($_POST["comments"]);
		$score = filter_var($_POST["score"], FILTER_VALIDATE_INT);
		$companyid = filter_var($_GET["789"], FILTER_VALIDATE_INT);
		$jobseekerid = $_SESSION["jobseekerid"];

		if (!$score || !$companyid || empty($comments)) {
			exit("Invalid input");
		}
		
		$query = "INSERT INTO finalyearproject.feedback(DateFeedback, FeedBackComments, FeedBackScore, Job_SeekerID, CompanyID) VALUES (?, ?, ?, ?, ?)";
		$params = [$date, $comments, $score, $jobseekerid, $companyid];
		$result = sqlsrv_query($connect,$query, $params);

		if ($result === false) {
			error_log(print_r(sqlsrv_errors(), true)); // Log the error internally
			exit("Database error."); // Generic error to user
		}
		
		

	sqlsrv_close($connect);
	
	?>
	
	<script>
		alert("Add Feedback Done!");
    window.location.href="JobSeekerCompanyListing.php";
	</script>
	
	<?php
	}
	?>

<script src="script.js"></script>