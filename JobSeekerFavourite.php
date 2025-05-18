<?php
include("Jobseeker_session.php");
require_once('connect.php');
$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row38=sqlsrv_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<html>
<head>
	<title>Job Seeker Website</title>
	<link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <span class="dashboard">Favourite</span>
        </div>
    
       
    
        <div class="profile-details">
          <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?> </span>
          
        </div>
      </nav>

      <section class="home-section">
        <div class="home-content">
            <div class="all-boxes">
            <div class="title">Favourite</div>
            <div class="applicant-boxes">  
                
                <div class="recent-applicant">
                    <div class="favourite-boxes">
                        
                            <div class="left">
                            <?php
                                    $jobseekerid = $_SESSION["jobseekerid"];
                                    $query = "select * from finalyearproject.favourite WHERE Job_SeekerID = '$jobseekerid' ORDER BY FavouriteID DESC";
                                    $result = sqlsrv_query($connect,$query);
                                    
                                    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                                    {
                                      
                                      $new = $row['JobListingID'];
                                      $FavID= $row['FavouriteID'];
                                      $sql2 = "select * from finalyearproject.joblisting  WHERE JobListingID  = '$new' and is_deleted = '0'";
                                      $result2 = sqlsrv_query($connect,$sql2);
                                      $row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
                                      if(is_array($row2)){


                                      $new2 = $row2['CompanyID'];
                                      $sql3 = "select * from finalyearproject.company_info WHERE CompanyID  = '$new2' and is_deleted='0'";
                                      $result3 = sqlsrv_query($connect,$sql3);
                                      $row3 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
                                      
                                      if(is_array($row3)){
                                    ?>  
                                <div class="favourite-card">
                                    <div class="img">
									<img src="data:image/jpeg;base64,<?php echo base64_encode($row3['CompanyLogo']);?>" style="max-width:200px;max-height:200px; object-fit: contain;">
                                    </div>
                                    <div>

                                    <h2><a href="JobSeekerJobDescription.php?jid=<?php echo $new;?>"><?php echo $row2["JobTitle"]; ?></a></h2>
                                    <p><b>Company:</b><?php echo $row3['CompanyName']?></p>
                                    <p><b>Location:</b> <?php echo $row2['JobLocation']?></p>
                                    <p><b>Salary: RM </b> <?php echo $row2['JobSalary']?></p>
                                    
                                    <div class="divbtn">
                                        <div class="button">
                                        <a href="JobSeekerFavourite.php?apply&jid=<?php echo $new; ?>&cid=<?php echo $new2; ?>">Apply</a>
                                         </div>
                                        <div class="button">
                                        <a href="JobSeekerFavourite.php?dlt&jid=<?php echo $new; ?>&cid=<?php echo $new2; ?>&fid=<?php echo $FavID; ?>" onclick="return confirmation();">Delete</a>
                                      </div>
                                    </div>
                                    </div>
                                </div>
                            <?php
                                      }
                                    }
                                    }
                            ?>

                            
                            </div>

                    </div>
                </div>
            
                  </div>
            </div>
            </div>
        </div>
        </div>
      </section>


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
if(isset($_GET['dlt']))
	{
		$jid=$_GET['jid'];
		$cid=$_GET['cid'];
    $fid=$_GET['fid'];
		$query = "DELETE FROM finalyearproject.favourite WHERE FavouriteID = $fid";
		$result = sqlsrv_query($connect,$query);
		?>
		<script type='text/javascript'>
			window.location.href="JobSeekerJobListing.php";alert("Deleted successfully!");
		</script>
		<?php
		}	
?>			


<script src="script.js"></script>
<script>
function confirmation()
{
	var answer=confirm("Do you really want to delete?");
	return answer;
}
</script>