<?php
include ("Jobseeker_session.php");
require_once('connect.php');
$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row38=sqlsrv_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<html>
<head>
	<title>Job Seeker Website</title>
	<link rel="stylesheet" href="style.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
			  <span class="dashboard">Job Listing</span>
			</div>
		
			
			<form class="search-box" method="get" action="JobSeekerJobListing.php">
				<input type="text" name="search" placeholder="Search...">
			</form>
			
		
			<div class="profile-details">
			  <span class="admin_name"><?php echo $row38['Job_SeekerUsername'] ?></span>
			  
			</div>
		  </nav>

		  <section class="home-section">
			<div class="home-content">
				<div class="all-boxes">
			  		<div class="title">Job Listing</div>
			  		
						<div class="applicant-boxes">
							<div class="description-boxes">
								<form method="post">
									<div class="listing-boxes">
											<div class="left">
												<?php
												$sql = "SELECT * FROM finalyearproject.joblisting WHERE is_deleted='0' ";

												$params = [];
												if (isset($_GET['search'])) {
													$search = $_GET['search'];
													if (strlen($search) > 100) {
														$search = trim($search);
													}
													$sql .= " AND (JobTitle LIKE ? OR JobType LIKE ? OR JobLocation LIKE ?) AND is_deleted='0' ";
													$likeSearch = "%$search%";
													$params = [$likeSearch, $likeSearch, $likeSearch];
												}

												$result = sqlsrv_query($connect, $sql, $params);

												while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
													$eee = $row['JobListingID'];
													$new = $row['CompanyID'];
													$sql2 = "SELECT * FROM finalyearproject.company_info WHERE CompanyID = ? AND is_deleted='0'";
													$params2 = [$new];
													$result2 = sqlsrv_query($connect, $sql2, $params2);
													$row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
													if (is_array($row2)) {
												?>
												<div class="job-card">
													<div class="img">
													<img src="data:image/jpeg;base64,<?php echo base64_encode($row2['CompanyLogo']);?>" style="max-width:200px;max-height:200px; object-fit: contain;">
													</div>
													<div class="content">
														<h2 ><a href="JobSeekerJobDescription.php?jid=<?php echo $eee;?>"><?php echo $row["JobTitle"]; ?></a></h2>
														<p><b>Company:</b> <?php echo $row2["CompanyName"]; ?></p>
														<p><b>Location:</b> <?php echo $row["JobLocation"]; ?></p>
														<p><b>Salary: RM </b> <?php echo $row["JobSalary"]; ?></p>
														<div class="action">
														
														<a href="JobSeekerJobListing.php?apply&jid=<?php echo $eee; ?>&cid=<?php echo $new; ?>">Apply</a>
														<a href="JobSeekerJobListing.php?favourite&jid=<?php echo $eee; ?>&cid=<?php echo $new; ?>">Favourite</a>
														<a href="JobSeekerReport.php?joblistingid=<?php echo $eee;?>">Report Job</a>
														
													</div>
													</div>
													
												</div>
												<?php
												
														}
														
												
												}
												?>
												
											</div>
										
									</div>
								</form>
							</div>
						</div>
				</div>
				</div>
			</div>
			
		  </section>		  
            
			</div>
			
</body>
</html>
<?php
if (!isset($_SESSION["jobseekerid"])) {
    exit("Unauthorized access");
}

$date = date('Y-m-d H:i:s'); // ISO format better for DB

// Validate function to ensure integer inputs
function validate_int($value) {
    return filter_var($value, FILTER_VALIDATE_INT);
}

if (isset($_GET['apply'])) {
    $jid = validate_int($_GET['jid']);
    $cid = validate_int($_GET['cid']);
    $jobseekerid = $_SESSION["jobseekerid"];

    if (!$jid || !$cid) {
        exit("Invalid input");
    }

    // Check if resume exists
    $sql66 = "SELECT * FROM finalyearproject.resume_jobseeker WHERE Job_SeekerID = ?";
    $params66 = [$jobseekerid];
    $result666 = sqlsrv_query($connect, $sql66, $params66);
    if ($result666 === false) {
        error_log(print_r(sqlsrv_errors(), true));
        exit("Database error");
    }
    $row6 = sqlsrv_fetch_array($result666, SQLSRV_FETCH_ASSOC);

    if (is_array($row6)) {
        // Check if already applied
        $sql5 = "SELECT * FROM finalyearproject.application WHERE CompanyID = ? AND Job_SeekerID = ? AND JobListingID = ?";
        $params5 = [$cid, $jobseekerid, $jid];
        $result5 = sqlsrv_query($connect, $sql5, $params5);
        if ($result5 === false) {
            error_log(print_r(sqlsrv_errors(), true));
            exit("Database error");
        }
        $row8 = sqlsrv_fetch_array($result5, SQLSRV_FETCH_ASSOC);
        if (is_array($row8)) {
            echo "<script type='text/javascript'>
                alert('You Had Applied for this job!');
                window.location.href='JobSeekerJobListing.php';
            </script>";
        } else {
            $query = "INSERT INTO finalyearproject.application(DateApplied, ApplicationStatus, Job_SeekerID, CompanyID, JobListingID) VALUES (?, 'In Progress', ?, ?, ?)";
            $params = [$date, $jobseekerid, $cid, $jid];
            $result = sqlsrv_query($connect, $query, $params);
            if ($result === false) {
                error_log(print_r(sqlsrv_errors(), true));
                exit("Database error");
            }
            echo "<script type='text/javascript'>
                alert('Apply Done!');
                window.location.href='JobSeekerJobListing.php';
            </script>";
        }
    } else {
        echo "<script type='text/javascript'>
            alert('Please Build Up Your CV First');
            window.location.href='JobSeekerJobListing.php';
        </script>";
    }
}

if (isset($_GET['favourite'])) {
    $jid = validate_int($_GET['jid']);
    $jobseekerid = $_SESSION["jobseekerid"];

    if (!$jid) {
        exit("Invalid input");
    }

    $sql9 = "SELECT * FROM finalyearproject.favourite WHERE Job_SeekerID = ? AND JobListingID = ?";
    $params9 = [$jobseekerid, $jid];
    $result6 = sqlsrv_query($connect, $sql9, $params9);
    if ($result6 === false) {
        error_log(print_r(sqlsrv_errors(), true));
        exit("Database error");
    }
    $row7 = sqlsrv_fetch_array($result6, SQLSRV_FETCH_ASSOC);
    if (is_array($row7)) {
        echo "<script type='text/javascript'>
            alert('You Had Added This Job To Favourite!');
            window.location.href='JobSeekerJobListing.php';
        </script>";
    } else {
        $query0 = "INSERT INTO finalyearproject.favourite(Job_SeekerID, JobListingID) VALUES (?, ?)";
        $params0 = [$jobseekerid, $jid];
        $result0 = sqlsrv_query($connect, $query0, $params0);
        if ($result0 === false) {
            error_log(print_r(sqlsrv_errors(), true));
            exit("Database error");
        }
        echo "<script type='text/javascript'>
            alert('Add To Favourite Done!');
            window.location.href='JobSeekerJobListing.php';
        </script>";
    }
}
?>
		
		<script src="script.js"></script>