<?php 
include("admin_session.php");

$id = $_SESSION["adminid"];

// Query admin info using prepared statement
$query = "SELECT * FROM finalyearproject.admin_info WHERE AdminID = ?";
$params = array($id);
$result = sqlsrv_query($connect, $query, $params);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

$row49 = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

// Query jobcategory info (not deleted)
$query2 = "SELECT * FROM finalyearproject.jobcategory WHERE is_deleted = '0' ORDER BY JobCategoryID DESC";
$result2 = sqlsrv_query($connect, $query2);

if ($result2 === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Category</title>
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
          <a href="AdminCategory.php"  class="active">
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
      <span class="dashboard">Category</span>
    </div>
    
    <div class="profile-details">
    <span class="admin_name"><?php echo $row49["AdminFullName"] ?></span>
      
    </div>
  </nav>
   <section class="home-section">
       
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                  <div class="right-side">
                    <div class="box-topic">
                      <a href="AdminAddCategory.php">Add Category</a>
                    </div>
                    
                  </div>
                  
                </div>
            </div>
        <div class="all-boxes">
            <div class="title">Category</div>

            <div class="applicant-boxes">
              <div class="recent-applicant">
                <div class="table">
                    <table>
                      <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <?php
                          $username = $_SESSION["adminusername"]; // show admin name

                          while ($row = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)) {
                              $ctid = $row['JobCategoryID'];
                          ?>
                          <tr>
                              <td><?php echo $row['JobCategoryID']; ?></td>
                              <td><?php echo $row['JobCategoryName']; ?></td>
                              <td>
                                  <a class="btn btn-danger" href="AdminCategory.php?dlt&ctid=<?php echo $ctid ?>" onclick="return confirmation();">Delete</a>
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
    $ctid = $_GET['ctid'];

    // Prepare the update query with a parameter placeholder
    $query = "UPDATE finalyearproject.jobcategory SET is_deleted = '1' WHERE JobCategoryID = ?";
    
    // Prepare parameters array
    $params = array($ctid);

    // Execute the query using sqlsrv_query
    $result = sqlsrv_query($connect, $query, $params);

    if ($result === false) {
        // Handle errors if needed
        die(print_r(sqlsrv_errors(), true));
    }
?>
    <script type='text/javascript'>
        window.location.href = "AdminCategory.php";
    </script>
<?php
}
?>
