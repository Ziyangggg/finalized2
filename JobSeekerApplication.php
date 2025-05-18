<?php
require_once('connect.php');
include('Jobseeker_session.php');
$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row38=sqlsrv_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Application</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
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
      <span class="dashboard">Application</span>
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

            <div class="all-boxes">
              <div class="title">Application</div>

                <div class="application-content">
                  <div class="application-status">
                    
                    <a href="JobSeekerApplication.php?all">All</a>
                    <a href="JobSeekerApplication.php?inprocess">In Process</a>
                    <a href="JobSeekerApplication.php?accepted">Accepted</a>
                    <a href="JobSeekerApplication.php?rejected">Rejected</a>
                    
                    <br><br>
                  </div>
                  <div class="table">
                    <table>
                      <thead>
                        <tr>
                            <th>Applied Role</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                      $jobseekerid = $_SESSION["jobseekerid"];
                      if(isset($_GET['all']))
                      {
                        $sql = "select * from finalyearproject.application WHERE Job_SeekerID = '$jobseekerid'ORDER BY ApplicationID DESC";
                        }
                        else if(isset($_GET['inprocess'])){
                          $sql = "select * from finalyearproject.application WHERE Job_SeekerID = '$jobseekerid' AND ApplicationStatus = 'In Progress' ORDER BY ApplicationID DESC";
                        }
                        else if(isset($_GET['accepted'])){
                          $sql = "select * from finalyearproject.application WHERE Job_SeekerID = '$jobseekerid' AND ApplicationStatus = 'Accepted' ORDER BY ApplicationID DESC";
                        }
                        else if(isset($_GET['rejected'])){
                          $sql = "select * from finalyearproject.application WHERE Job_SeekerID = '$jobseekerid' AND ApplicationStatus = 'Rejected' ORDER BY ApplicationID DESC";
                        }
                        else{
                          $sql = "select * from finalyearproject.application WHERE Job_SeekerID = '$jobseekerid'ORDER BY ApplicationID DESC";
                        }
                        
                      $result = sqlsrv_query($connect,$sql);
                      
                      while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
										{
                      if(is_array($row))
                      { $appli = $row['ApplicationID'];
                        $new = $row['JobListingID']; 
                        $sql2 = "select * from finalyearproject.joblisting WHERE JobListingID = '$new' and is_deleted = '0'";
                        $result2 = sqlsrv_query($connect,$sql2);
                        $row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);

                        $new2 = $row['CompanyID'];
                        $sql3 = "select * from finalyearproject.company_info WHERE CompanyID = '$new2' and is_deleted = '0'";
                        $result3 = sqlsrv_query($connect,$sql3);
                        $row3 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
                        
                        if(is_array($row2))
                        {
                            
                          if(is_array($row3)){
                            $new3 = $row2['JobCategoryID'];
                            $sql4 = "select * from finalyearproject.jobcategory WHERE JobCategoryID = '$new3' and is_deleted = '0'";
                            $result4 = sqlsrv_query($connect,$sql4);
                            $row4 = sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC);

                            ?>
                            <td><?php echo $row2['JobTitle']; ?></td>
                            <td><?php echo $row['DateApplied']; ?></td>
                            <td><?php echo $row['ApplicationStatus']; ?></td>

                            <td class="text-center">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?php echo $appli; ?>">View</button>

                              <div class="modal fade" id="exampleModalLong<?php echo $appli; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered"  role="document">
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <h5 class="modal-title" id="exampleModalLongTitle">Job Detail</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">

                                      <div class="Job-Description" style="text-align: left; margin-left: 50px;">
                                      <div class="img">
                                      <img src="data:image/jpeg;base64,<?php echo base64_encode($row3['CompanyLogo']);?>" style="max-width:200px;max-height:200px; object-fit: cover;">
                                      </div>
                                        <h2 ><?php echo $row2["JobTitle"]; ?></h2>
                                        <h5>Company</h5>
                                        <p><li><?php echo $row3["CompanyName"]; ?></li></p>
                                        
                                        <h5>Job Description</h5>
                                        <p><li><?php echo $row2["JobDescription"]; ?></li></p>
                                        <h5>Job Requirement</h5>
                                        <p><li><?php echo $row2["JobRequirement"]; ?></li></p>

                                        <h5>Job Type</h5>
                                        <p><li><?php echo $row2["JobType"]; ?></li></p>
                                        <h5>Job Category</h5>
                                        <p><li><?php echo $row4["JobCategoryName"]; ?></li></p>
                                        <h3>Location:</h3>
                                        <p><li><?php echo $row2["JobLocation"]; ?></li></p>
                                        <h3>Salary:</h3>
                                        <p><li>RM: <?php echo $row2["JobSalary"]; ?></li></p>
                                        <h3>Company Registration No.</h3>
                                        <p><li><?php echo $row3["CompanyRegistrationNo"]; ?></li></p>
                                      </div>

                                      
                                    
                                    
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>   
                            </td>
                          </tr>
                          <?php
                              }
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
    </div>
  </div>

</body>
</html>

<script src="script.js"></script>

