<?php include("admin_session.php"); ?>
<?php

require_once('connect.php');
$id=$_SESSION["adminid"];
$query = "SELECT * FROM admin_info WHERE AdminID = '$id'";
$result = mysqli_query($connect,$query);
$row49 = mysqli_fetch_assoc($result);

$query = "select * from job_seekerinfo where is_deleted='0' order by Job_SeekerID DESC";
$result = mysqli_query($connect,$query);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Jobseeker List</title>
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
      <i class='bx bxl-upwork'></i>
      <span class="logo_name">Admin</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="AdminDashboard.php" >
            <i class='bx bxs-dashboard'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="AdminMessage.php" >
            <i class='bx bxs-message' ></i>
            <span class="links_name">Message</span>
          </a>
        </li>
        <li>
          <a href="AdminJobListing.php"  >
            <i class='bx bxs-briefcase-alt-2'></i>
            <span class="links_name">Job Listing </span>
          </a>
        </li>
        <li>
          <a href="AdminReportedJob.php" >
            <i class='bx bxs-report'></i>
            <span class="links_name">Reported Job</span>
          </a>
        </li>
       
        <li>
          <a href="AdminFeedBack.php">
            <i class='bx bxs-star'></i>
            <span class="links_name">Company Feedback</span>
          </a>
        </li>

    

        <li>
            <a href="AdminCompanyList.php">
                <i class='bx bxs-buildings' ></i>
              <span class="links_name">Company List</span>
            </a>
        </li>

        <li>
            <a href="AdminJobSeekerList.php" class="active">
              <i class='bx bxs-group' ></i>
              <span class="links_name">Job Seeker List</span>
            </a>
        </li>

        <li>
          <a href="AdminCategory.php">
            <i class='bx bxs-category-alt' ></i>
            <span class="links_name">Category</span>
          </a>
      </li>

      <li>
        <a href="AdminProfile.php">
            <i class='bx bxs-user'></i>
          <span class="links_name">Profile</span>
        </a>
    </li>

    <li>
      <a href="AdminAddAdmin.php" >
        <i class='bx bxs-user-badge'></i>
        <span class="links_name">New Admin</span>
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
      <span class="dashboard">Job Seeker List</span>
    </div>
    
    <div class="profile-details">
    <span class="admin_name"><?php echo $row49["AdminUsername"] ?></span>
      
    </div>
  </nav>
  <section class="home-section">
   

    <div class="home-content">
     
      <div class="all-boxes">
      <div class="title">Jobseeker List</div>
      <div class="applicant-boxes">
        <div class="recent-applicant">
          
          <div class="table">
            <table>
              <thead>
                <tr>
                    <th>Job Seeker ID</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                          $username=$_SESSION["adminusername"];//nshow admin name
                          while($row = mysqli_fetch_assoc($result))
                          {
                            $jsid=$row['Job_SeekerID']; 
                            $sql4 = "select * from resume_jobseeker WHERE Job_SeekerID = '$jsid'";
                            $result4 = mysqli_query($connect,$sql4);
                            $row4 = mysqli_fetch_assoc($result4);
                            if(is_array($row4)){
                              
                                    
                          ?>
            <tr>
                          
                          <td><?php echo $row['Job_SeekerID']; ?></td>
                          <td><?php echo $row['Job_SeekerFullname']; ?></td>
                          <td><?php echo $row['Job_SeekerEmail']; ?></td>
                          <td><?php echo $row['Job_SeekerPhone']; ?></td>
                          <td><?php echo $row['Job_SeekerAddress']; ?></td>
                          <td >
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view<?php echo $jsid; ?>">View</button>
                          <div class="modal fade" id="view<?php echo $jsid; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered"  role="document">
                                  <div class="modal-content">
                                    <div class="modal-header" >
                                      <h5 class="modal-title" id="exampleModalLongTitle">Resume</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">

                                      <div class="Job-Description" style="text-align: left; margin-left: 50px;">
                                      
                                        <h2 ><?php echo $row4['Job_SeekerFullname']; ?></h2>
                                        <h5>Email</h5>
                                        <p><?php echo $row4['Job_SeekerEmail'];?></p>
                                        <h5>Phone</h5>
                                        <p><?php echo $row4['Job_SeekerPhone']; ?></p>

                                        <h5>Address</h5>
                                        <p><?php echo $row4['Job_SeekerAddress']; ?></p>
                                        <h5>Race</h5>
                                        <p><?php echo $row4['Job_SeekerRace']; ?></p>
                                        <h5>Experience</h5>
                                        <p><?php echo $row4['Job_SeekerExperience']; ?></p>
                                        <h5>Education</h5>
                                        <p><?php echo $row4['Job_SeekerEducation']; ?></p>
                                        <h5>Language</h5>
                                        <p><?php echo $row4['Job_SeekerLanguage']; ?></p>
                                        <h5>Skill</h5>
                                        <p><?php echo $row4['Job_SeekerSkill']; ?></p>
                                        <h5>Summary</h5>
                                        <p><?php echo $row4['Job_SeekerSummary']; ?></p>
                                        
                                      </div>

                                      
                                    
                                    
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>   
                          <a class="btn btn-danger" href="AdminJobSeekerList.php?dlt&jsid=<?php echo $jsid ?>" onclick="return confirmation();">Delete</a>
                          </td>
                          
              </tr>
              <?php

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
<script>
function confirmation()
{
	var answer=confirm("Do you really want to delete?");
	return answer;
}
</script>
<?php

	if(isset($_GET['dlt']))
	{
		$jsid=$_GET['jsid'];
		$query = "UPDATE job_seekerinfo SET is_deleted = '1' WHERE Job_SeekerID = $jsid ";
		$result = mysqli_query($connect,$query);
?>
            <script type='text/javascript'>

                window.location.href="AdminJobSeekerList.php";
            </script>

<?php
  }
?>