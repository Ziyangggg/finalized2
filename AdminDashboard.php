<?php include("admin_session.php"); ?>
<?php
include('connect.php'); // This should be using sqlsrv_connect

$id = $_SESSION["adminid"];

// Parameterized query to avoid SQL injection
$sql = "SELECT * FROM finalyearproject.admin_info WHERE AdminID = ?";
$params = array($id);

$stmt = sqlsrv_query($connect, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$row49 = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

sqlsrv_free_stmt($stmt);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    

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
          <a href="AdminDashboard.php"  class="active">
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
      <span class="dashboard">Dashboard</span>
    </div>
    
    <div class="profile-details">
      <span class="admin_name"><?php echo $row49["AdminUsername"] ?></span>
      
    </div>
  </nav>

  <?php
    // This assumes you've already included connect.php where $connect is your sqlsrv connection
    $jobSeekerQuery = "SELECT COUNT(*) AS total FROM finalyearproject.job_seekerinfo WHERE is_deleted = '0'";
    $jobSeekerStmt = sqlsrv_query($connect, $jobSeekerQuery);

    $count = 0;

    if ($jobSeekerStmt && $row = sqlsrv_fetch_array($jobSeekerStmt, SQLSRV_FETCH_ASSOC)) {
        $count = $row['total'];
    }

    $companyQuery = "SELECT COUNT(*) AS total FROM finalyearproject.company_info WHERE is_deleted = '0'";
    $companyStmt = sqlsrv_query($connect, $companyQuery);
    $count2 = 0;

    if ($companyStmt && $row2 = sqlsrv_fetch_array($companyStmt, SQLSRV_FETCH_ASSOC)) {
        $count2 = $row2['total'];
    }
  ?>

  <section class="home-section">
   
    <div class="home-content">
      <div class="overview-boxes">
        <div class="admin-box">
          <div class="right-side">
            <div class="box-topic">
              <a href="AdminJobSeekerList.php">New Jobseekers</a>
            </div>
            <div class="applicant-number">
              <div class="number"><?php echo $count;?></div>
                <div class="applicants">
                  <span class="text">person</span>
                </div>
            </div>
          </div>
          
        </div>
        <div class="admin-box">
          <div class="right-side">
            <div class="box-topic">
              <a href="AdminCompanyList.php">New Company</a>
            </div>
            <div class="applicant-number">
              <div class="number"><?php echo $count2;?></div>
                <div class="applicants">
                  <span class="text">company</span>
                </div>
            </div>
          </div>
          
        </div>
        
      </div>
      <div class="all-boxes">
      <div class="title">Recent Job Listing</div>
      <div class="applicant-boxes">
        <div class="recent-applicant">
          
          <div class="table">
            <table>
              <thead>
                <tr>
                    <th>Job Listing ID</th>
                    <th>Job Title</th>
                    <th>Category</th>
                    <th>Salary</th>
                    <th>Company Name</th>
                    <th>Company ID</th>
                </tr>
            </thead>
            <tbody>
            <tr>
              
                          <?php
                            $username = $_SESSION["adminusername"]; // show admin name

                            // Get latest 10 job listings (SQL Server doesn't support LIMIT — use TOP)
                            $sql = "SELECT TOP 10 * FROM finalyearproject.joblisting WHERE is_deleted = '0' ORDER BY JobListingID DESC";
                            $stmt = sqlsrv_query($connect, $sql);

                            if ($stmt) {
                                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                    $companyID = $row['CompanyID'];

                                    // Get company info
                                    $sql2 = "SELECT * FROM finalyearproject.company_info WHERE CompanyID = ? AND is_deleted = '0'";
                                    $params2 = array($companyID);
                                    $stmt2 = sqlsrv_query($connect, $sql2, $params2);

                                    if ($stmt2 && $row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['JobListingID']; ?></td>
                                        <td><?php echo $row['JobTitle']; ?></td>
                                        <td><?php echo $row['JobCategoryID']; ?></td>
                                        <td><?php echo $row['JobSalary']; ?></td>
                                        <td><?php echo $row2['CompanyName']; ?></td>
                                        <td><?php echo $row['CompanyID']; ?></td>
                                    </tr>
                            <?php
                                    }
                                }
                            }

                            sqlsrv_close($connect);
                            ?>

            </tbody>
        </table>
              
          </div>
          <div class="button">
            <a href="AdminJobListing.php">See All</a>
          </div>
        </div>
        
      </div>
    </div>
    </div>
  </section>

</body>
</html>
<script src="script.js"></script>