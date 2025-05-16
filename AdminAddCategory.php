<?php 
include("admin_session.php"); 

$id = $_SESSION["adminid"];

// Prepare query with parameter placeholder
$query = "SELECT * FROM finalyearproject.admin_info WHERE AdminID = ?";

// Prepare parameters array
$params = array($id);

// Execute query using sqlsrv_query
$result = sqlsrv_query($connect, $query, $params);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch result as associative array
$row49 = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Add Admin</title>
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
              <a href="AdminCategory.php" class="active">
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
      <span class="dashboard">Add Category</span>
    </div>
    
    <div class="profile-details">
    <span class="admin_name"><?php echo $row49["AdminUsername"] ?></span>
      
    </div>
  </nav>
  <section class="home-section">
   









    <div class="home-content">
     
      <div class="all-boxes">
      <div class="title">Add New Category</div>
      <div class="applicant-boxes">
        <div class="recent-applicant">
            <div class="company-detail-wrapper">
              <form class="post-form-wrapper"  method="POST" autocomplete="off">
            
                  <div class="row gap-20">
                    <div class="clear"></div>
                    


                    <div class="col-sm-6 col-md-4">
                    
                      <div class="form-group">
                        <label>Add Category</label>
                        <input type="text" name="category" required class="form-control"  placeholder="Enter new category">
                      </div>
                      
                    </div>


                    <div class="clear"></div>

                    <div class="col-sm-15 md-10">
                      <button type="submit" class="btn btn-primary" name="submit">Save</button>
                      
                    </div>
    
                  </div>
                  
                </form>
            </div>
            </div>
      </div>
    </div>
    </div>
  </section>

</body>
</html>

<script src="script.js"></script>

<?php
$username = $_SESSION["adminusername"]; // show admin name
include("connect.php");

if (isset($_POST["submit"])) {
    $category = $_POST["category"];

    // Prepare the SQL statement with a parameter placeholder
    $query = "INSERT INTO finalyearproject.jobcategory (JobCategoryName, is_deleted) VALUES (?, 0)";

    // Prepare parameters array
    $params = array($category);

    // Execute the query
    $result = sqlsrv_query($connect, $query, $params);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Close the connection
    sqlsrv_close($connect);
?>

	
	<script>
		alert("Add New Category Done!");
    window.location.href="AdminCategory.php";
	</script>
	
	<?php
	}
  ?>
