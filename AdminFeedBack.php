<?php
include("admin_session.php");
require_once('connect.php'); // your connection file should use sqlsrv_connect

$id = $_SESSION["userid"];

$sql = "SELECT * FROM finalyearproject.admin_info WHERE AdminID = ?";
$params = array($id);

$stmt = sqlsrv_query($connect, $sql, $params);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true)); // error handling
}

$row49 = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Company Feedback</title>
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
          <a href="AdminFeedBack.php" class="active">
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
      <span class="dashboard">Company Feedback</span>
    </div>
    
    <div class="profile-details">
    <span class="admin_name"><?php echo $_SESSION["fullname"] ?></span>
      
    </div>
  </nav>
  <section class="home-section">
   

    <div class="home-content">
     
      <div class="all-boxes">
      <div class="title">Feedback</div>
      <div class="applicant-boxes">
        <div class="recent-applicant">
          
          <div class="table">
            <table>
              <thead>
                <tr>
                    <th>FeedBack ID</th>
                    <th>Company Name</th>
                    <th>Company ID</th>
                    <th>Jobseekers ID</th>
                    <th>Jobseekers Name</th>
                    <th>Date</th>
                    <th>Feedback Comments</th>
                    <th>Feedback Score</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                          <?php
                            $username = $_SESSION["fullname"]; // show admin name

                            $sql = "SELECT * FROM finalyearproject.feedback ORDER BY FeedbackID DESC";
                            $result = sqlsrv_query($connect, $sql);
                            if ($result === false) {
                                die(print_r(sqlsrv_errors(), true));
                            }

                            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                                $new = $row['CompanyID'];
                                $sql2 = "SELECT * FROM finalyearproject.company_info WHERE CompanyID = ? AND is_deleted = '0'";
                                $params2 = array($new);
                                $result2 = sqlsrv_query($connect, $sql2, $params2);
                                if ($result2 === false) {
                                    die(print_r(sqlsrv_errors(), true));
                                }
                                $row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
                                if (is_array($row2)) {
                                    $new2 = $row['Job_SeekerID'];
                                    $sql3 = "SELECT Job_SeekerUsername FROM finalyearproject.job_seekerinfo WHERE Job_SeekerID = ? AND is_deleted = '0'";
                                    $params3 = array($new2);
                                    $result3 = sqlsrv_query($connect, $sql3, $params3);
                                    if ($result3 === false) {
                                        die(print_r(sqlsrv_errors(), true));
                                    }
                                    $row3 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
                                    if (is_array($row3)) {
                                        ?>
                          <td><?php echo $row['FeedBackID']; ?></td>
                          <td><?php echo $row2['CompanyName']; ?></td>
                          <td><?php echo $row['CompanyID']; ?></td>
                          <td><?php echo $row['Job_SeekerID']; ?></td>
                          <td><?php echo $row3['Job_SeekerUsername']; ?></td>
                          <td><?php echo $row['DateFeedback']; ?></td>
                          <td><?php echo $row['FeedBackComments']; ?></td>
                          <td><?php echo $row['FeedBackScore']; ?></td>
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
        
      </div>
    </div>
    </div>
  </section>

</body>
</html>

<script src="script.js"></script>