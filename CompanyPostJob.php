<?php
include('company_session.php');
$sql = "SELECT * FROM finalyearproject.Company_Info WHERE CompanyID = ? AND is_deleted = '0'";
$params = array($companyid);

$query = sqlsrv_query($connect, $sql, $params);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}

$row49 = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Post A Job</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class='bx bxl-upwork'></i>
        <span class="logo_name">Company</span>
      </div>
        <ul class="nav-links">
          <li>
            <a href="CompanyDashboard.php" >
              <i class='bx bxs-dashboard'></i>
              <span class="links_name">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="CompanyJobPosting.php" class="active">
              <i class='bx bxs-briefcase-alt-2'></i>
              <span class="links_name">Jobs </span>
            </a>
          </li>
          <li>
            <a href="CompanyApplicant.php">
              <i class='bx bxs-group'></i>
              <span class="links_name">Application</span>
            </a>
          </li>
         
          <li>
            <a href="CompanyReview.php">
              <i class='bx bxs-star'></i>
              <span class="links_name">Review</span>
            </a>
          </li>
          <li>
              <a href="CompanyProfile.php">
                  <i class='bx bxs-buildings' ></i>
                <span class="links_name">Company Profile</span>
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
        <span class="dashboard">Post Job</span>
      </div>
      
      <div class="profile-details">
        <span class="admin_name"><?php echo $row49["CompanyUsername"] ?></span>
        
      </div>
    </nav>
      <section class="home-section">
        
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                  <div class="right-side">
                    <div class="box-topic">
                      <a href="#">Post A Job</a>
                    </div>
                    
                  </div>
                  
                </div>

            </div>
            <div class="all-boxes">
            <div class="applicant-boxes">
							<div class="recent-applicant">
                <div class="company-detail-wrapper">

                    
                        

                        <form class="post-form-wrapper" method="POST" autocomplete="off">
                
                            
                            
                        
                                <div class="col-sm-8 col-md-8">
                                
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input name="title" required type="text" class="form-control" placeholder="Enter job title" value="<?php echo isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8'):''; ?>">
                                    </div>
                                    
                                </div>
                                
                                <div class="clear"></div>
                                
                                <div class="col-sm-8 col-md-8">
                                
                                <div class="form-group">
                                    <label>Location</label>
                                    <input name="location" required type="text" class="form-control" placeholder="Enter Location" value="<?php echo isset($location) ? htmlspecialchars($location, ENT_QUOTES, 'UTF-8'):''; ?>">
                                </div>
                                
                      

                            <div class="clear"></div>
                                
                                <div class="col-sm-8 col-md-8">
                                
                               
                                
                            </div>
                                    
                                </div>
                                
                                <div class="clear"></div>
                                
                                <div class="col-sm-8 col-md-8">
                                
                                    <div class="form-group">
                                        <label>Job Category</label>
                                        <select name="category" required class="selectpicker show-tick form-control" data-live-search="true">
                                        <option disabled value="">Select</option>
                                      <?php
                                       $sql11 = "SELECT * FROM finalyearproject.jobcategory where is_deleted = '0'";
                                       $result22 = sqlsrv_query($connect, $sql11);
                                       if ($result22 === false) {
                                          die(print_r(sqlsrv_errors(), true));
                                      }

                                       while ($row33 = sqlsrv_fetch_array($result22, SQLSRV_FETCH_ASSOC))
                                       {
                                        
                                        ?>
                                        <option value="<?php echo $row33['JobCategoryID']?>" data-content="<span class='label label-warning'><?php echo $row33['JobCategoryName']?></span>"><?php echo $row33['JobCategoryName']?></option>
                                        
                                        <?php
                                       }
                                        ?>
                                        </select>
                                    </div>
                                    
                                </div>


                                <div class="col-sm-8 col-md-8">
                                
                                  <div class="form-group">
                                      <label>Salary</label>
                                      <input name="salary" required type="number" class="form-control" placeholder="Eg: 2000" value="<?php echo isset($salary) ? htmlspecialchars($salary, ENT_QUOTES, 'UTF-8'):''; ?>">
                                  </div>
                                  
                              </div>
                                
                                
                                <div class="col-sm-8 col-md-8">
                                
                                    <div class="form-group mb-20">
                                        <label>Job Type:</label>
                                        <select name="jobtype" required class="selectpicker show-tick form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
                                            <option value="" selected>Select</option>
                                            <option value="Full-time" data-content="<span class='label label-warning'>Full-time</span>">Full-time</option>
                                            <option value="Part-time" data-content="<span class='label label-danger'>Part-time</span>">Part-time</option>
                                            <option value="Part-time" data-content="<span class='label label-danger'>Part-time</span>">Internship</option>
                                            <option value="Freelance" data-content="<span class='label label-success'>Freelance</span>">Freelance</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                

                                    
                                    
                                </div>

                                <div class="clear"></div>
                                
                                <div class="col-sm-12 col-md-12">
                                
                                    <div class="form-group bootstrap3-wysihtml5-wrapper">
                                        <label>Job Description</label>
                                        <textarea class="form-control bootstrap3-wysihtml5" name="description" required placeholder="Enter description ..." style="height: 200px;"><?php echo isset($description) ? htmlspecialchars($description, ENT_QUOTES, 'UTF-8'):''; ?></textarea>
                                    </div>
                                    
                                </div>
                                
                                <div class="clear"></div>
                                
                                
                                
                                <div class="clear"></div>
                                
                                <div class="col-sm-12 col-md-12">
                                
                                    <div class="form-group bootstrap3-wysihtml5-wrapper">
                                        <label>Requirements</label>
                                        <textarea name="requirements" required class="form-control bootstrap3-wysihtml5" placeholder="Enter requirements..." style="height: 200px;"><?php echo isset($requirements) ? htmlspecialchars($requirements, ENT_QUOTES, 'UTF-8'):''; ?></textarea>
                                    </div>
                                    
                                </div>
                                
                                <div class="clear"></div>
                                

                                
                                <div class="clear"></div>
                                

                                
                                <div class="clear mb-10"></div>

                                
                                <div class="clear mb-15"></div>

                                
                                <div class="clear"></div>
                                <div class="col-sm-15 md-10">
                                <button type="submit" name="submit" class="btn btn-primary">Post Your Job</button>
                                </div>
                        

                            </div>
                            
                        </form>
                </div>
              </div>                         
            </div>   
            </div> 
      
    </div>








</body>
</html>

<script>
    let sidebar = document.querySelector(".sidebar");
 let sidebarBtn = document.querySelector(".sidebarBtn");
 sidebarBtn.onclick = function() {
   sidebar.classList.toggle("active");
   if(sidebar.classList.contains("active")){
   sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
 }else
   sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
 }
  </script>




<?php
	include("connect.php");
	
	if(isset($_POST["submit"]))
	{
		$title = trim($_POST["title"]);
		$location = trim($_POST["location"]);
		$category = $_POST["category"];
		$salary = trim($_POST["salary"]);
    $jobtype = $_POST["jobtype"];
    $description = trim($_POST["description"]);
    $requirements = trim($_POST["requirements"]);
    $companyid = $_SESSION["companyid"];
    $jobcategoryid = $_POST["category"];
		
    $sql = "INSERT INTO finalyearproject.joblisting (
                JobTitle, JobDescription, JobSalary, JobRequirement, JobType, 
                JobLocation, JobCategoryID, CompanyID, is_deleted
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, '0')";
    
    $params = array($title, $description, $salary, $requirements, $jobtype, $location, $jobcategoryid, $companyid);
    $result = sqlsrv_query($connect, $sql, $params);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_close($connect);
	?>
	
	<script>
		alert("Post Job Done!");
    window.location.href="CompanyPostJob.php";
	</script>
	
	<?php
	}