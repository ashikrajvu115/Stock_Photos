<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

    <?php
    $edituserid = mysqli_real_escape_string($bd->link, $_GET['edituserid']);
        if (!isset($edituserid) || $edituserid == NULL) {
            echo "<script>window.location = catlist.php;</script>";
            //header("location:catlist.php");
           }else{
             $edituserid=$edituserid;
        }
    ?>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Update User Role</h2>
               <div class="block copyblock">

               <?php
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $role=$_POST['role'];
                    if (empty($role)) {
                        echo "<span style='color:red; font-size:20px' >Flied empty</span>";
                    }else{
                        $query="UPDATE tbl_user SET  role='$role' where id='$edituserid'";
                        $update_row=$bd->update($query);
                        if ($update_row) {
                            echo "<span style='color:grenn; font-size:20px' >update Success</span>";
                        }
                        else{
                            echo "<span style='color:red; font-size:20px' >UPDATE Not Success</span>";
                        }
                    }
                }
               ?> 

               <?php
                   $query="SELECT * from  users where id='$edituserid' order by id desc";
                            $editrole = $bd->select($query);
                                while ($result=$editrole->fetch_assoc()) {
                               
               ?>
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="role" value="<?php echo $result['role']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>        