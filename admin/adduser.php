<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    if (Session::get('userRole') != '1' ) {
      echo "<script>window.location = 'index.php'; </script>";
     } 
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock">

               <?php
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                   $username = $fm->validation($_POST['username']);
                   $password = $fm->validation(md5($_POST['password']));
                   $role     = $fm->validation($_POST['role']);


                    $username=mysqli_real_escape_string($bd->link,$username);
                    $password=mysqli_real_escape_string($bd->link,$password);
                    $role=mysqli_real_escape_string($bd->link,$role);

                    if (empty($username) or empty($password) or empty($role)) {
                        echo "<span style='color:red; font-size:20px' >Flied must not be empty</span>";
                    }else{
                        $query="INSERT INTO  tbl_user(username,password,role) VALUES('$username' , '$password' , '$role')";
                        $usernsert=$bd->insert($query);
                        if ($usernsert) {
                            echo "<span style='color:green; font-size:20px' >Use Create  Success</span>";
                        }
                        else{
                            echo "<span style='color:red; font-size:20px' >User  Not cerate</span>";
                        }
                    }
                }
               ?> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="username" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter New Password..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                    <option>Select User Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Author</option>
                                    <option value="3">Editor</option>
                                </select>
                            </td>
                        </tr>
						<tr> <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>        