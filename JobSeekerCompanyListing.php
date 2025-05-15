<?php
include("Jobseeker_session.php");
require_once('connect.php');
$query=mysqli_query($connect,"SELECT * FROM job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(mysqli_error());
$row38=mysqli_fetch_array($query);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Company List</title>
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
      <span class="dashboard">Company Listing</span>
    </div>

 
      <form class="search-box" method="get" action="JobSeekerCompanyListing.php">
                <input type="text" name="search" placeholder="Search...">
                
      </form>
      
			<?php
            require_once('connect.php');

            $search = '';
            if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $query = "select * from company_info where  CompanyUsername LIKE '%$search%' AND is_deleted='0' OR CompanyName LIKE '%$search%'  AND  is_deleted='0'";
            } else {
            $query = "SELECT * FROM company_info WHERE is_deleted='0' ";
            }

$result = mysqli_query($connect, $query);
?>
    
    <div class="profile-details">
      <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?></span>
      
    </div>
  </nav>


  <section class="home-section">
   

    <div class="home-content">
      
        <div class="all-boxes">
          <div class="title">Company List</div>
          <div class="applicant-boxes">
            <div class="description-boxes">
    
              <div class="container">
                 <?php
                   while($row = mysqli_fetch_assoc($result) ){
                    $fff = $row['CompanyID']; 
                    
                 ?>

                    <div class="company-card">
                      <div class="img" style="max-height: 200px;max-width: 200px;min-height: 200px;min-width: 200px; object-fit: cover; display: flex;align-items: center">
                   		 <img src="data:image/jpeg;base64,<?php echo base64_encode($row['CompanyLogo']);?>" style="max-width:200px;max-height:200px;object-fit: contain;display: flex;align-items: center">
				   	  </div>
					<a href="JobSeekerCompanyInfo.php?456=<?php echo $fff;?>"><?php echo $row["CompanyName"]; ?></a>
                      <p><?php echo $row["CompanyIndustry"]; ?></p>

                    </div>
                  <?php
                   }
                  ?>
               
              </div>
            </div>
          </div>
        </div>
      
    </div>
</section>	
</body>
</html>

<script src="script.js"></script>