<?php
include("Jobseeker_session.php");
$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row38=sqlsrv_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Company info</title>
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
      <span class="dashboard">Company Info</span>
    </div>

    
    
    <div class="profile-details">
      <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?></span>
      
    </div>
  </nav>
  <section class="home-section">
   

  <div class="home-content">
     
      
      <div class="all-boxes">
        <?php
        $ggg=$_GET["456"];
        $query = "select * from finalyearproject.company_info WHERE CompanyID = $ggg and is_deleted = '0'";
        $result = sqlsrv_query($connect,$query);      
        if($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
          $new = $row['CompanyID']; 

        ?>
       
          <div class="description-boxes">
            <div class="boxes">

                    <div class="description-card">
                        <div class="img">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['CompanyLogo']);?>" style="max-width:200px;max-height:200px; object-fit: cover;">
                        </div>
                        <div class="title"><h2><?php echo $row["CompanyName"]; ?></h2></div>
                        
                        <div class="Job-Description">
                          <h3>Company Descripsion</h3>
                          <?php echo $row["CompanyDescription"]; ?>
                        </div>
                        <div>
                          <br>
                              <h3>Company Industry</h3>
                              <p><?php echo $row["CompanyIndustry"]; ?></p>
                          <br>
                              <h3>Our Team</h3>
                              <p><?php echo $row["CompanyOurTeam"]; ?></p>   
                          <br>
                              <h3>Our Vision</h3>
                              <p><?php echo $row["CompanyOurVision"]; ?></p>
                              <h3>Our Mission</h3>
                              <p><?php echo $row["CompanyOurMission"]; ?></p>
                              <h3>Company Registration Number</h3>
                              <p><?php echo $row["CompanyRegistrationNo"]; ?></p>
                          <br>
                          <h3>Contact Information</h3>
                            <p><li><?php echo $row["CompanyPhone"]; ?></p></li></p>
                            <p><li><?php echo $row["CompanyEmail"]; ?></p></li></p>
                            <p><li><?php echo $row["CompanyWebsite"]; ?></p></li></p>
                         <a href="JobseekerFeedback.php?789=<?php echo $ggg;?>">Add Feedback</a>
                        </div>
                    </div>   
            </div>
          </div>
          <div class="title">
            Review
          </div>
          <div class="similarjob">
            
            <div class="similarboxes">
            <table>
              <thead>
                <tr>
                  <th style="width: 10%;">Feedback ID</th>
                  <th  style="width: 20%;">Company Name</th>
                  <th  style="width: 10%;">Ratings</th>
                  <th  style="width: 10%;">Date</th>
                  <th  style="width: 50%;">Comments</th>
                </tr>
              </thead>

              <tbody>
              <tr>
                          <?php
                          $companyid = $row["CompanyID"];
                          $query = "select * from finalyearproject.feedback WHERE CompanyID = $companyid ";
                          $result = sqlsrv_query($connect,$query);
                          while($row98 = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                          {
                            $new = $row98['Job_SeekerID']; 
                            $sql2 = "select * from finalyearproject.job_seekerinfo WHERE Job_SeekerID = '$new'and is_deleted = '0'";
                            $result2 = sqlsrv_query($connect,$sql2);
                            $row97 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
                            if(is_array($row97)){
                            
                            $new2 = $row['CompanyID']; 
                            $sql3 = "select CompanyName from finalyearproject.company_info WHERE CompanyID = '$new2'and is_deleted = '0'";
                            $result3 = sqlsrv_query($connect,$sql3);
                            $row96 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
                            if(is_array($row96)){
                          ?>
                          <td><?php echo $row98['FeedBackID']; ?></td>
                          <td><?php echo $row96['CompanyName']; ?></td>
                          <td><?php echo $row98['FeedBackScore']; ?>/5</td>
                          <td><?php echo $row98['DateFeedback']; ?></td>
                          <td><?php echo $row98['FeedBackComments']; ?></td>
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
          
          <div class="title">
            Job Available
          </div>
          <div class="similarjob">
            
            <div class="similarboxes">
              <?php
                      $sql2 = "select * from finalyearproject.joblisting WHERE CompanyID = '$ggg' AND is_deleted = '0' ORDER BY JobListingID DESC ";
                      $result2 = sqlsrv_query($connect,$sql2);
                    while($row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)){
                       $abc = $row2['JobListingID'];
              ?>
                <div class="box">
                  <div class="img">
                  <img src="data:image/*;base64,<?php echo base64_encode($row['CompanyLogo']);?>" style="max-width:200px;max-height:200px; object-fit: cover;">
                  </div>
                  <div class="1">
                  
                    <div class="jobtitle">
                      <a href="JobSeekerJobDescription.php?jid=<?php echo $abc;?>"><?php echo $row2["JobTitle"]; ?></a>
                    </div>
                    <div class="company">
								    <b>Company :</b>
								    <b><a href="#"><?php echo $row["CompanyName"]; ?></a></b>
								
							    </div>
                  <div class="Location">
                    <b>Location: </b><?php echo $row2["JobLocation"]; ?>
                  </div>
                  <div class="Salary">
                    <b>Salary: RM </b><?php echo $row2["JobSalary"]; ?>
                  </div>
                  </div>
                </div>
              <?php
                }
              ?>

            </div>
          </div>
        </div>

        
          <?php
            }
          ?>
          
      </div>  
      

      
      
  </div>
        
    
    
  </section>

</body>
</html>

<script src="script.js"></script>