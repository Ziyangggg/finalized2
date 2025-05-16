<?php 
include("admin_session.php"); 
require_once('connect.php');

$username = $_SESSION["adminusername"];
$id = $_SESSION["adminid"];

// Use parameterized query to avoid SQL injection
$sql = "SELECT * FROM finalyearproject.admin_info WHERE AdminID = ?";
$params = array($id);

// Query the database using SQLSRV
$stmt = sqlsrv_query($connect, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

// Free the statement when done
sqlsrv_free_stmt($stmt);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Admin Profile</title>
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
          <a href="AdminCategory.php">
            <i class='bx bxs-category-alt' ></i>
            <span class="links_name">Category</span>
          </a>
      </li>

      <li>
        <a href="AdminProfile.php"  class="active">
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
      <span class="dashboard">Profile</span>
    </div>
    
    <div class="profile-details">
      <span class="admin_name"><?php echo $row["AdminUsername"] ?></span>
      
    </div>
  </nav>
  <section class="home-section">
   

    <div class="home-content">
     
      <div class="all-boxes">
      <div class="title">Admin Profile</div>
      <div class="applicant-boxes">
        <div class="recent-applicant">
            <div class="company-detail-wrapper">
            <?php
                  
                  if(is_array($row))
                  {
            ?>
            <form class="post-form-wrapper"  method="POST" autocomplete="off">
            
            <div class="row gap-20">
              <div class="clear"></div>
              
              <div class="col-sm-12 col-md-8">
              
                <div class="form-group">
                  <label>Name</label>
                  <input name="fullname" placeholder="Enter new admin Name" type="text" class="form-control"  value="<?php echo $row["AdminFullName"]; ?>" required>
                </div>
                
              </div>
              <div class="clear"></div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Username</label>
                    <input name="username" placeholder="Enter new  Username" type="text" class="form-control" value="<?php echo $row["AdminUsername"]; ?>" required>
                </div>
                
              </div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Password</label>
                    <input class="form-control" placeholder="Enter Password" name="password" required type="password" value="<?php echo $row["AdminPassword"]; ?>" required> 
                </div>
                
              </div>
              
              <div class="clear"></div>

            
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="tel" name="phonenumber" pattern="[0-9]{10,11}" required class="form-control" placeholder="Enter Phone Number Exp:0176899754" value="<?php echo $row["AdminPhone"]; ?>">
                </div>
                
              </div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" name="emailaddress" required class="form-control"  placeholder="Enter Admin email" value="<?php echo $row["AdminEmail"]; ?>">
                </div>
                
              </div>

              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" required class="form-control"  placeholder="Enter Admin address" value="<?php echo $row["AdminAddress"]; ?>">
                </div>
                
              </div>


              <div class="clear"></div>

              <div class="col-sm-15 md-10">
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                
              </div>

            </div>
            
        </form>
        <?php
                  }
              ?>
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
if (isset($_POST["submit"])) {
    $name = $_POST["fullname"];
    $username = $_POST["username"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $phone = $_POST["phonenumber"];
    $email = $_POST["emailaddress"];

    // Make sure $adminid is set, e.g., from session
    $adminid = $_SESSION['adminid']; 

    $sql = "UPDATE finalyearproject.admin_info 
            SET AdminFullName = ?, AdminPassword = ?, AdminUsername = ?, AdminEmail = ?, AdminPhone = ?, AdminAddress = ? 
            WHERE AdminID = ?";

    $params = array($name, $password, $username, $email, $phone, $address, $adminid);

    $stmt = sqlsrv_query($connect, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        // Update successful, show alert and redirect
        echo '<script>
                alert("Update Admin Profile Done!");
                window.location.href="AdminProfile.php";
              </script>';
        exit(); // stop further execution after redirect
    }
}
?>
