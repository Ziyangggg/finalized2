<?php
require_once('connect.php');
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
    <title>Jobs</title>
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
        <span class="dashboard">Jobs</span>
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
                      <a href="CompanyPostJob.php">Post A Job</a>
                    </div>
                    
                  </div>
                  
                </div>
            </div>
        <div class="all-boxes">
            <div class="title">Posted Job</div>

            <div class="applicant-boxes">
              <div class="recent-applicant">
        <div class="table">

        <table>
            
            <thead>
                <tr role="row"><th class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 10.3375px;">ID</th>
                  <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Vacancy Information: activate to sort column ascending" style="width: 124.287px;">Vacancy Information</th>

                  <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51.525px;">Position</th>
                  <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51.525px;">Category</th>
                  <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51.525px;">Action</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                          <?php
                          $companyid = $_SESSION["companyid"];
                          $sql = "SELECT * FROM finalyearproject.joblisting WHERE CompanyID = $companyid and is_deleted='0' Order By JobListingID DESC";
                          $params = array($companyid);
                          $result = sqlsrv_query($connect, $sql, $params);
                          
                          
                          $sql3 = "SELECT * FROM finalyearproject.company_info WHERE CompanyID = ? AND is_deleted = '0'";
                          $params3 = array($companyid);
                          $result3 = sqlsrv_query($connect, $sql3, $params3);
                          $row2 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);

                          while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                              $categoryid = $row['JobCategoryID'];
                              $sql4 = "SELECT * FROM finalyearproject.jobcategory WHERE JobCategoryID = ? AND is_deleted = '0'";
                              $params4 = array($categoryid);
                              $result4 = sqlsrv_query($connect, $sql4, $params4);
                              $row3 = sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC);
                              $jid = $row['JobListingID'];
                          ?>

                          <td><?php echo $row['JobListingID']; ?></td>
                          <td><?php echo $row['JobTitle']; ?></td>
                          <td><?php echo $row['JobType']; ?></td>
                          <td><?php echo $row3["JobCategoryName"]; ?></td>
                          <td class="text-center">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view<?php echo $jid; ?>">View</button>
                          <div class="modal fade" id="view<?php echo $jid; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                  <div class="modal-dialog modal-lg modal-dialog-centered"  role="document">
                                    <div class="modal-content">
                                      <div class="modal-header" >
                                        <h5 class="modal-title" id="exampleModalLongTitle">Job Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">

                                      <div class="Job-Description" style="text-align: left; margin-left: 50px;">
                                      <img src="data:image/jpeg;base64,<?php echo base64_encode($row2['CompanyLogo']);?>" style="max-width:200px;max-height:200px;">

                                      
                                        <h2 ><?php echo $row["JobTitle"]; ?></h2>
                                        <h5>Company</h5>
                                        <p><li><?php echo $row2["CompanyName"]; ?></li></p>
                                        
                                        <h5>Job Description</h5>
                                        <p><li><?php echo $row["JobDescription"]; ?></li></p>
                                        <h5>Job Requirement</h5>
                                        <p><li><?php echo $row["JobRequirement"]; ?></li></p>

                                        <h5>Job Type</h5>
                                        <p><li><?php echo $row["JobType"]; ?></li></p>
                                        <h5>Job Category</h5>
                                        <p><li><?php echo $row3["JobCategoryName"]; ?></li></p>
                                        <h5>Location:</h5>
                                        <p><li><?php echo $row["JobLocation"]; ?></li></p>
                                        <h5>Salary:</h5>
                                        <p><li>RM: <?php echo $row["JobSalary"]; ?></li></p>
                                        <h5>Company Registration No.</h5>
												                <p><li><?php echo $row2["CompanyRegistrationNo"]; ?></li></p>
                                      </div>
                                    </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                          </div> 
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $jid; ?>">Edit</button>
                        <form class="post-form-wrapper" method="POST" autocomplete="off">  
                        <div class="modal fade" id="edit<?php echo $jid; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-lg "  role="document">
                                      <div class="modal-content">
                                        <div class="modal-header" >
                                          <h5 class="modal-title" id="exampleModalLongTitle">Job Detail</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                        
                                        <div class="company-detail-wrapper">
    
                                              <input type="hidden"  name="jobid" value="<?php echo $row['JobListingID'] ?>">

                                            <div class="form-group">
                                                <label>Job Title</label>
                                                <input name="title" required type="text" class="form-control" placeholder="Enter job title" value="<?php echo $row['JobTitle'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Location</label>
                                                <input name="location" required type="text" class="form-control" placeholder="Enter Location" value="<?php echo $row['JobLocation'] ?>">
                                            </div>

                                           


                                              <div class="form-group">
                                                  <label>Job Category</label>
                                                  <select name="category"  >
                                                    <option disabled value="">Select</option>
                                                    <?php
                                                    $sql11 = "select * from finalyearproject.jobcategory where is_deleted = '0'";
                                                    $result22 = sqlsrv_query($connect, $sql11);
                                                    while ($row33 = sqlsrv_fetch_array($result22, SQLSRV_FETCH_ASSOC))
                                                    {
                                                      
                                                      ?>
                                                      <option value="<?php echo $row33['JobCategoryID']?>" data-content="<span class='label label-warning'><?php echo $row33['JobCategoryName']?></span>"><?php echo $row33['JobCategoryName']?></option>
                                                      <?php
                                                    }
                                                      ?>
                                                  </select>
                                              </div>

                                            <div class="form-group">
                                            
                                                <label>Salary</label>
                                                <input name="salary" required type="number" class="form-control" placeholder="Eg: 2000" value="<?php echo $row['JobSalary'] ?>">
                                            </div>

                                        
                                            <div class="form-group mb-20">
                                                <label>Job Type:</label>
                                                <select name="jobtype" >
                                                    <option value="Full-time" data-content="<span class='label label-warning'>Full-time</span>">Full-time</option>
                                                    <option value="Part-time" data-content="<span class='label label-danger'>Part-time</span>">Part-time</option>
                                                    <option value="Internship" data-content="<span class='label label-danger'>Part-time</span>">Internship</option>
                                                    <option value="Freelance" data-content="<span class='label label-success'>Freelance</span>">Freelance</option>
                                                </select>
                                            </div>

                                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                                <label>Job Description</label>
                                                <textarea class="form-control bootstrap3-wysihtml5" name="description" required placeholder="Enter description ..." style="height: 200px;" ><?php echo $row['JobDescription'] ?></textarea>
                                            </div>
                                            

                                        

                                        
                                            <div class="form-group bootstrap3-wysihtml5-wrapper">
                                                <label>Requirements</label>
                                                <textarea name="requirements" required class="form-control bootstrap3-wysihtml5" placeholder="Enter requirements..." style="height: 200px;" ><?php echo $row['JobRequirement'] ?></textarea>
                                            </div>
                                           
                                            
                                        </div>
                                        
                                      </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary" name="submit"><a href="CompanyJobPosting.php?save&jid=<?php echo $jid ?>"></a>Save</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                            </div>   
                            </form> 
                        <a class="btn btn-danger" href="CompanyJobPosting.php?dlt&jid=<?php echo $jid ?>" onclick="return confirmation();">Delete</a>
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

	if(isset($_GET['dlt']))
	{
		$jid=$_GET['jid'];
		$query = "UPDATE finalyearproject.joblisting SET is_deleted = '1' WHERE JobListingID = $jid";
		$params = array($jid);
		$result = sqlsrv_query($connect, $query, $params);
		if ($result === false) 
    {
			die(print_r(sqlsrv_errors(), true));
		}
?>
            <script type='text/javascript'>

                window.location.href="CompanyJobPosting.php";
            </script>
<?php
		}

    if(isset($_POST['submit']))
    
  { 
    $jobid = $_POST["jobid"];
    $title = $_POST["title"];
		$location = $_POST["location"];
		$category = $_POST["category"];
		$salary = $_POST["salary"];
    $jobtype = $_POST["jobtype"];
    $description = $_POST["description"];
    $requirements = $_POST["requirements"];
    $companyid = $_SESSION["companyid"];
    $jobcategoryid = $_POST["category"];
    
    $query = "UPDATE finalyearproject.joblisting SET JobTitle = '$title' ,JobDescription = '$description' ,JobSalary = '$salary' ,JobRequirement = '$requirements' ,JobType = '$jobtype' ,JobLocation = '$location'  ,JobCategoryID = '$jobcategoryid'   WHERE JobListingID =$jobid";
    $params = array($title, $description, $salary, $requirements, $jobtype, $location, $jobcategoryid, $jobid);
    $result = sqlsrv_query($connect, $query, $params);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }
 ?>   

    <script type='text/javascript'>
               
                window.location.href="CompanyJobPosting.php";
            </script>
 <?php
  }
    
  
?>			
