<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
    <?php
    $editpostid = mysqli_real_escape_string($bd->link, $_GET['editpostid']);
        if (!isset($editpostid ) || $editpostid  == NULL) {
            echo "<script>window.location = 'postlist.php'; </script>";
           }else{
             $postid=$editpostid;
        }
    ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Post</h2>
                <?php
                     if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $title=mysqli_real_escape_string($bd->link,$_POST['title']);
                    $body=mysqli_real_escape_string($bd->link,$_POST['body']);
                    $tags=mysqli_real_escape_string($bd->link,$_POST['tags']);
                    $author=mysqli_real_escape_string($bd->link,$_POST['author']);
                    $userid=mysqli_real_escape_string($bd->link,$_POST['userid']);

                    if ($title == "" || $body == "" || $tags == "" || $author == ""){
                      echo "<span style='color:red; font-size:25px;'>Flied Must Not Be Empty</span>";
                    }else{
                        $query="UPDATE tbl_post SET 
                        title='$title',
                        body='$body',
                        author='$author',
                        tags='$tags',
                        userid='$userid',
                        status='0'
                        where id='$postid'";

                        

                        $update_row=$bd->update($query);
                        if ($update_row) {
                             echo "<span style='color:green; font-size:25px;'>Post Update Successfuly</span>";
                        }else{
                          echo "<span style='color:green; font-size:25px;'>Something problem fell this time not any post</span>";  
                        }
                    }

                }
                ?>
                <div class="block"> 

                <?php
                    $query="SELECT * from tbl_post where id ='$postid'";
                    $getpost=$bd->select($query);
                      while ($postresult=$getpost->fetch_assoc()) {
                ?>              
                 <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $postresult['title'];?>" class="medium" />
                            </td>
                        </tr>
                        <!--<tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input name="image" type="file" />
                            </td>
                        </tr>-->
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
                                    <?php echo $postresult['body'];?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $postresult['tags'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $postresult['author'];?>" class="medium" />
                                <input type="hidden" name="userid" class="medium" value="<?php echo Session::get('userId'); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }  ?>
                </div>
            </div>
        </div>

         <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
    
<?php include 'inc/footer.php';?> 
   
