<?php include 'connection.php'; ?>
<?php include 'adminheader.php'; ?>
<?php
$select= "select * from admins";
$query = mysqli_query($conn,$select);
$data_fetch=mysqli_fetch_assoc($query);
$oldpass = $data_fetch['admin_password'];
if(isset($_POST['submit']))
{
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $cnfnewpass=$_POST['cnfnewpass'];

    if($oldpass==$oldpass) {
        if ($newpass == $cnfnewpass) {
            $update = "update admins set admin_password='$newpass' WHERE admin_id=1";
            $query1 = mysqli_query($conn, $update);
            if ($query1) {
                echo "<h4 align='center'><font color='green'><b>Password Succesfully Changed !</b></font></h4>";
            }
            else
            {
                echo "error";
            }
        }
            else {
                echo "<h4 align='center'><font color='red'><b>Your both password do not match !</font></h4>";
            }
        }

    else
    {
        echo "<h4 align='center'><font color='red'><b>You Entered Wrong Password</font></b></h4>";
    }
    echo "pp";
}

?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Change Password</h1>
        </div>
    </div>
    <div id="page-wrapper">
        <div class="container-fluid">



            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">Change Password</div>
                        <div class="panel-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" name="oldpass" placeholder= "*******" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="newpass" placeholder="*******" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cnfnewpass" placeholder="*******" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <a href="dashboard.php" class="btn btn-danger btn-sm">Cancel</a>
                                    <input type="submit" value="Update" name="submit" class="btn btn-success btn-sm"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

