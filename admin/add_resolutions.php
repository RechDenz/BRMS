<?php require_once('includes/session.php');
require_once('includes/conn.php');
if (isset($_SESSION["usertype"])) 
{
    if ($_SESSION["usertype"] != 1) {
        header("Location:../access-denied.php");
    }
}
$page = 'resolutions';
$menu = 'add_resolutions';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>BRMS | Add Resolution</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/awesome/font-awesome.css">
  <link rel="stylesheet" href="assets/css/animate.css">
</head>
<body>
  <div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include 'includes/navbar.php'; ?>
    <!-- Page Content Holder -->
    <div id="content">
        <div clas="col-md-12 sammacmedia">
            <img src="../enduser/img/1.png" class="img-thumbnail">
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right  samuel">
                        <li><a href="#"><?php require_once('includes/name.php');?></a></li>
                        <li ><a href="logout.php"><i class="fa fa-power-off"> Logout</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="line"></div>
        <?php
        if(isset($mysqli,$_POST['submit']))
        {
            $official_id = mysqli_real_escape_string($mysqli,$_POST['official-id']);
            $details = mysqli_real_escape_string($mysqli,$_POST['details']);
            $datecreated = date("Y-m-d"); 

            $sql = "INSERT INTO resolutions (official_id, resolution_details, date_created)
                VALUES('$official_id','$details','$datecreated')";
            $results = mysqli_query($mysqli,$sql);
            if($results==1)
            { ?>
                <div class="alert alert-success animated bounce" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Successfully! </strong><?php echo'added a resolution';?>
                </div>
            <?php } else { ?>
                <div id="sams1" class="sufee-alert alert with-close alert-danger alert-dismissible fade show col-lg-12">
                    <span class="badge badge-pill badge-danger">Error</span>
                    OOPS something went wrong
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php    
            }      
        }
        ?>
        <div class="panel panel-default sammacmedia">
            <div class="panel-heading">BRMS | Add a Resolution</div>
            <div class="panel-body">
                <form method="post" action="add_resolutions.php">
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <label>Official ID</label>
                            <input type="text" class="form-control" name="official-id" required>  
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <label>Details</label>
                             <textarea rows="6" style="width:100%; padding: 10px;" name="details" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="submit" class="btn btn-suc btn-block"><span class="fa fa-plus"></span> Add</button>  
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-dan btn-block"><span class="fa fa-times"></span> Cancel</button>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="line"></div>
        <footer>
            <p class="text-center">
            Barangay Records Management System &copy;<?php echo date(" Y ");?> | Ronnel Brosola    
            </p>
        </footer>
    </div>
</div>
<!-- jQuery CDN -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js CDN -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Custom Js -->
<script src="assets/js/admin-custom.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
        
        $('sams').on('click', function() {
            $('makota').addClass('animated tada');
        });
        
        window.setTimeout(function() {
            $("#sams1").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove(); 
            });
        }, 5000);
    });
</script>
</body>
</html>