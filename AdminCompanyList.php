<?php 
include("admin_session.php");
require_once('connect.php');

$id = $_SESSION["userid"];

// Query 1: Select admin info
$query = "SELECT * FROM finalyearproject.users WHERE userid = ?";
$params = array($id);
$result = sqlsrv_query($connect, $query, $params);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

$row49 = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

// Query 2: Select company info (not deleted)
$query2 = "SELECT * FROM finalyearproject.company_info WHERE is_deleted = '0' ORDER BY CompanyID DESC";
$result2 = sqlsrv_query($connect, $query2);

if ($result2 === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
          <a href="AdminJobListing.php" >
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
            <a href="AdminCompanyList.php"  class="active">
                <i class='bx bxs-buildings' ></i>
              <span class="links_name">Company List</span>
            </a>
        </li>

        <li>
            <a href="AdminJobSeekerList.php">
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
      <span class="dashboard">Company List</span>
    </div>
    
    <div class="profile-details">
    <span class="admin_name"><?php echo $_SESSION["fullname"] ?></span>
      
    </div>
  </nav>
  <section class="home-section">
   

    <div class="home-content">
     
      <div class="all-boxes">
      <div class="title">Company Listing</div>
      <div class="applicant-boxes">
        <div class="recent-applicant">
          
          <div class="table">
            <table>
              <thead>
                <tr>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Size</th>
                    <th>Industry</th>
                    
                    
                    
                    <th>Phone</th>
                    
                    <th>Action</th>
                    
                </tr>
              </thead>
            <tbody>
            <tr>
                          <?php
                              $username = $_SESSION["fullname"]; // show admin name

                              while ($row = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) {
                                  $cid = $row['CompanyID'];
                          ?>
                          <td><?php echo $row['CompanyID']; ?></td>
                          <td><?php echo $row['CompanyName']; ?></td>
                          <td><?php echo $row['CompanySize']; ?></td>
                          <td><?php echo $row['CompanyIndustry']; ?></td>
                          
                          
                          
                          <td><?php echo $row['CompanyPhone']; ?></td>
                          
                          <td >
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view<?php echo $cid; ?>">View</button>
                          
                            <div class="modal fade" id="view<?php echo $cid; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered"  role="document">
                                      <div class="modal-content">
                                        <div class="modal-header" >
                                          <h5 class="modal-title" id="exampleModalLongTitle">Company Detail</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">

                                          <div class="all-boxes">
                                           
                                              <div class="description-boxes">
                                                <div class="boxes">

                                                        <div class="description-card">
                                                            <div class="img">
                                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['CompanyLogo']);?>" style="max-width:200px;max-height:200px;">
                                                            </div>
                                                            
                                                            <div class="Job-Description">
                                                            <div class="title"><h2><?php echo $row["CompanyName"]; ?></h2></div>
                                                            
                                                            </div>
                                                              <br>
                                                                  <h3>Company Descripsion</h3>
                                                                  <p><?php echo $row["CompanyDescription"]; ?></p>  
                                                                  
                                                              <br>
                                                                  <h3>Our Team</h3>
                                                                  <p><?php echo $row["CompanyOurTeam"]; ?></p>   
                                                              <br>
                                                                  <h3>Our Vision</h3>
                                                                  <p><?php echo $row["CompanyOurVision"]; ?></p>
                                                                  <h3>Our Mission</h3>
                                                                  <p><?php echo $row["CompanyOurMission"]; ?></p>
                                                              <br>
                                                                  <h3>Contact Information</h3>
                                                                  <p><li><?php echo $row["CompanyPhone"]; ?></p></li></p>
                                                                  <p><li><?php echo $row["CompanyEmail"]; ?></p></li></p>
                                                                  <p><li><?php echo $row["CompanyWebsite"]; ?></p></li></p>
                                                              <br>
                                                                  <h3>Company Industry</h3>
                                                                  <p><?php echo $row["CompanyIndustry"]; ?></p>
                                                                  <h3>Company Registration Number</h3>
                                                                  <p><?php echo $row["CompanyRegistrationNo"]; ?></p>
                                        
                                              </div>   
                                            </div>
                                          </div>

                                        
                                      
                                      
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                            </div> 
                            
                            </div>
                            <a class="btn btn-danger" href="AdminCompanyList.php?dlt&cid=<?php echo $cid ?>" onclick="return confirmation();">Delete</a>
                            
                          </td>
             </tr>
                        <?php
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
    if (isset($_GET['dlt'])) {
        $cid = $_GET['cid'];

        // Prepare your SQL query with a parameter placeholder
        $query = "UPDATE finalyearproject.company_info SET is_deleted = '1' WHERE CompanyID = ?";

        // Prepare parameters as an array
        $params = array($cid);

        // Execute the query with parameters
        $result = sqlsrv_query($connect, $query, $params);

        if ($result === false) {
            // Handle error
            die(print_r(sqlsrv_errors(), true));
        }
?>
        <script type='text/javascript'>
            window.location.href = "AdminCompanyList.php";
        </script>
<?php
    }
?>
