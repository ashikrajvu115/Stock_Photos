<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>

                <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $password=mysql_real_escape_string($_POST['password']);
                    $pass=mysql_real_escape_string($_POST['pass']);

                    if ($password==$pass) {
                      $query="UPDATE tbl_user 
                      set 
                      password=$pass
                      ";
                    }
                ?>
                <div class="block">               
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <?php
                                    $query="SELECT * FROM tbl_user";
                                    $result=$bd->select($query);
                                    if ($result) {
                                       $value=$result->fetch_assoc();
                                ?>
                                <input type="password" placeholder="Enter Old Password..."  name="<?php $value['password']; ?>" class="medium" />
                                <?php } ?>
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="pass" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
<?php include 'inc/footer.php';?>  
