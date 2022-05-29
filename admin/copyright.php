<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    if (Session::get('userRole') != '1' ) {
      echo "<script>window.location = 'index.php'; </script>";
     } 
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <?php
                     if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $copy=mysqli_real_escape_string($bd->link,$_POST['copy']);
                  

                    if ($copy == ""){
                      echo "<span style='color:red; font-size:25px;'>Flied Must Not Be Empty</span>";
                    }else{
                        $query="UPDATE tbl_copyright SET 
                        copy='$copy'
                        where id= '1' ";

                        $update_row=$bd->update($query);
                        if ($update_row) {
                             echo "<span style='color:green; font-size:25px;'>Post Update Successfuly</span>";
                        }else{
                          echo "<span style='color:green; font-size:25px;'>Something problem fell this time not any post</span>";  
                        }
                    }
                }
                ?>
                <div class="block copyblock"> 
                 <?php
                    $query="SELECT * from tbl_copyright where id ='1'";
                    $getpost=$bd->select($query);
                      while ($copyright=$getpost->fetch_assoc()) {
                ?> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $copyright['copy'];?>" name="copy" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }  ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>  
