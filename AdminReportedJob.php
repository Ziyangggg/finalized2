<?php include("admin_session.php"); ?>
<?php
require_once('connect.php'); // Make sure this uses sqlsrv_connect()

$id = $_SESSION["adminid"];

$sql = "SELECT * FROM finalyearproject.admin_info WHERE AdminID = ?";
$params = array($id);

// Execute the query
$stmt = sqlsrv_query($connect, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch the result as an associative array
$row49 = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Reported Job</title>
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
          <a href="AdminReportedJob.php"  class="active">
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
      <span class="dashboard">Reported Job</span>
    </div>
    
    <div class="profile-details">
    <span class="admin_name"><?php echo $row49["AdminUsername"] ?></span>
      
    </div>
  </nav>
  <section class="home-section">
   

    <div class="home-content">
     
      <div class="all-boxes">
      <div class="title">Reported Job</div>
      <div class="applicant-boxes">
        <div class="recent-applicant">
          
          <div class="table">
            <table>
              <thead>
                <tr>
                    <th>Report ID</th>
                    <th>Job Listing ID</th>
                    <th>Job Title</th>
                    <th>Category</th>
                    <th>Reported Date</th>
                    <th>Company Name</th>
                    <th>Company ID</th>
                    <th>Reporter Name</th>
                    <th>Reporter ID</th>
                    <th>Reason</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
              $username = $_SESSION["adminusername"]; // show admin name

              $sql = "SELECT * FROM finalyearproject.report ORDER BY ReportID DESC";
              $stmt = sqlsrv_query($connect, $sql);

              if ($stmt === false) {
                  die(print_r(sqlsrv_errors(), true));
              }

              while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                  $jobListingID = $row['JobListingID'];

                  $sql2 = "SELECT * FROM finalyearproject.joblisting WHERE JobListingID = ? AND is_deleted = '0'";
                  $params2 = array($jobListingID);
                  $stmt2 = sqlsrv_query($connect, $sql2, $params2);
                  $row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);

                  if (is_array($row2)) {
                      $jobCategoryID = $row2['JobCategoryID'];

                      $sql3 = "SELECT * FROM finalyearproject.joblisting WHERE JobCategoryID = ? AND is_deleted = '0'";
                      $params3 = array($jobCategoryID);
                      $stmt3 = sqlsrv_query($connect, $sql3, $params3);
                      $row3 = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC);

                      if (is_array($row3)) {
                          $companyID = $row2['CompanyID'];

                          $sql4 = "SELECT * FROM finalyearproject.company_info WHERE CompanyID = ? AND is_deleted = '0'";
                          $params4 = array($companyID);
                          $stmt4 = sqlsrv_query($connect, $sql4, $params4);
                          $row4 = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC);

                          if (is_array($row4)) {
                              $jobSeekerID = $row['Job_SeekerID'];

                              $sql5 = "SELECT * FROM finalyearproject.job_seekerinfo WHERE Job_SeekerID = ? AND is_deleted = '0'";
                              $params5 = array($jobSeekerID);
                              $stmt5 = sqlsrv_query($connect, $sql5, $params5);
                              $row5 = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC);

                              if (is_array($row5)) {
                                  $categoryID = $row2['JobCategoryID'];

                                  $sql6 = "SELECT * FROM finalyearproject.jobcategory WHERE JobCategoryID = ? AND is_deleted = '0'";
                                  $params6 = array($categoryID);
                                  $stmt6 = sqlsrv_query($connect, $sql6, $params6);
                                  $row6 = sqlsrv_fetch_array($stmt6, SQLSRV_FETCH_ASSOC);

                                  if (is_array($row6)) {
                                      // Your output HTML or PHP block goes here...
              ?>
                  <td><?php echo $row['ReportID']; ?></td>
                  <td><?php echo $row2['JobListingID']; ?></td>
                  <td><?php echo $row2['JobTitle']; ?></td>
                  <td><?php echo $row3['JobCategoryID']; ?></td>
                  <td><?php echo $row['Date_Reported']; ?></td>
                  <td><?php echo $row4['CompanyName']; ?></td>
                  <td><?php echo $row4['CompanyID']; ?></td>
                  <td><?php echo $row5['Job_SeekerFullname']; ?></td>
                  <td><?php echo $row5['Job_SeekerID']; ?></td>
                  <td><?php echo $row['Reason_for_report']; ?></td>
                  <td >
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view<?php echo $row['ReportID']; ?>">View</button>
                  <div class="modal fade" id="view<?php echo $row['ReportID']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                  <div class="modal-dialog modal-lg modal-dialog-centered"  role="document">
                                    <div class="modal-content">
                                      <div class="modal-header" >
                                        <h5 class="modal-title" id="exampleModalLongTitle">Reported Job Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">

                                        <div class="Job-Description" style="text-align: left; margin-left: 50px;">
                                          <img src="data:image/jpeg;base64,<?php echo base64_encode($row4['CompanyLogo']);?>" style="max-width:200px;max-height:200px;">
                                          
                                          <h2 ><?php echo $row2["JobTitle"]; ?></h2>
                                          <h5>Company</h5>
                                          <p><li><?php echo $row4["CompanyName"]; ?></li></p>
                                          <h5>Job Description</h5>
                                          <p><li><?php echo $row2["JobDescription"]; ?></li></p>
                                          <h5>Job Requirement</h5>
                                          <p><li><?php echo $row2["JobRequirement"]; ?></li></p>

                                          <h5>Job Type</h5>
                                          <p><li><?php echo $row2["JobType"]; ?></li></p>
                                          <h5>Job Category</h5>
                                          <p><li><?php echo $row6["JobCategoryName"]; ?></li></p>
                                          <h5>Location:</h5>
                                          <p><li><?php echo $row2["JobLocation"]; ?></li></p>
                                          <h5>Salary:</h5>
                                          <p><li>RM: <?php echo $row2["JobSalary"]; ?></li></p>
                                          <h5>Company Registration No.</h5>
                                          <p><li><?php echo $row4["CompanyRegistrationNo"]; ?></li></p>
                                      </div>
                                    </div>

                                      
                                    
                                    
                                    
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                          </div>
                          <a class="btn btn-danger" href="AdminReportedJob.php?dlt&jid=<?php echo $new ?>" onclick="return confirmation();">Delete</a>
                  </td>
                </tr>
                <?php
                    }
                  }
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
require_once('connect.php'); // Ensure this uses sqlsrv_connect()

if (isset($_GET['dlt'])) {
    $jid = $_GET['jid'];

    // Use parameterized query to avoid SQL injection
    $sql = "UPDATE joblisting SET is_deleted = '1' WHERE JobListingID = ?";
    $params = array($jid);

    $stmt = sqlsrv_query($connect, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true)); // Debug SQL errors
    }
    ?>

    <script type="text/javascript">
        // Choose only ONE destination page
        window.location.href = "AdminReportedJob.php";
    </script>

<?php
}
?>