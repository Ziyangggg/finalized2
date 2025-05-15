<?php
include("Jobseeker_session.php");
require_once('connect.php');
$query=mysqli_query($connect,"SELECT * FROM job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(mysqli_error());
$row38=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

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
      <span class="dashboard">About Us</span>
    </div>

    

    <div class="profile-details">
      <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?></span>
      
    </div>
  </nav>
  

  <section class="home-section">
    

  
    
    
    <div class="home-content">
			<div class="all-boxes">
        <div class="applicant-boxes">
          <div class="recent-applicant">
          <div class="company-detail-wrapper">

          <div class="aboutUs">
            <div class="title">
              <h1>About Us</h1>
            </div>
            <div class="content">
              Welcome to our Job Seeker! Our mission is to create a seamless connection between job seekers and potential employers. We understand that job searching can be an overwhelming experience, which is why we have designed our platform to be both user-friendly and efficient. Our range of features includes a save function for job seekers to bookmark jobs they are interested in, CV making tools to create a professional resume, and employer company information to help job seekers make informed decisions.

              We take pride in providing a safe and secure environment for both job seekers and employers. Our website is accessible 24/7 and completely free to use. Our team is dedicated to providing a positive user experience and we are committed to continually improving our services.
              
              Thank you for choosing Job Seeker for your job search needs. We look forward to helping you find your dream job!</div>
          </div>

      <div>
        <br><h2 style="text-align:center">Our Team</h2><br>
      </div>
      
      <div class="row">

        <div class="column">
          <div class="card">
            <img src="TT.jpg" alt="TT" style="width:100%">
            <div class="container">
              <h3>Terry Teoh</h3>
              <p class="occupation">Developer</p>
              <p>1211203191@student.mmu.edu.my</p>
            </div>
          </div>
        </div>
      
        <div class="column">
          <div class="card">
            <img src="JF.jpg" alt="JF" style="width:100%">
            <div class="container">
              <h3>Kui Jun Foo</h3>
              <p class="occupation">Developer</p>
              <p>1211201760@student.mmu.edu.my</p>
            </div>
          </div>
        </div>
      
        <div class="column">
          <div class="card">
            <img src="ZY.jpg" alt="ZY" style="width:100%">
            <div class="container">
              <h3>Lee Zhan Yu</h3>
              <p class="occupation">Developer</p>
              <p>1211200096@student.mmu.edu.my</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
</body>
</html>

<script src="script.js"></script>