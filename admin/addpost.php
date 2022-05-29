<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php
                     if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $title=mysqli_real_escape_string($bd->link,$_POST['title']);
                    $body=mysqli_real_escape_string($bd->link,$_POST['body']);
                    $tags=mysqli_real_escape_string($bd->link,$_POST['tags']);
                    $author=mysqli_real_escape_string($bd->link,$_POST['author']);
                    $description=mysqli_real_escape_string($bd->link,$_POST['description']);
                    $userid=mysqli_real_escape_string($bd->link,$_POST['userid']);

                    if ($title == "" || $body == "" || $tags == "" || $author == "" || $description ==""){
                      echo "<span style='color:red; font-size:25px;'>Flied Must Not Be Empty</span>";
                    }else{
                        $query="INSERT into tbl_post(title, body, author, tags,description,userid) values('$title', '$body', '$author', '$tags', '$description','$userid')";
                        $insert_post=$bd->insert($query);
                        if ($insert_post) {
                             echo "<span style='color:green; font-size:25px;'>Post Successfuly</span>";
                        }else{
                          echo "<span style='color:green; font-size:25px;'>Something problem fell this time not any post</span>";  
                        }
                    }

                }
                ?>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
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
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" placeholder="Enter Tags" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Description</label>
                            </td>
                            <td>
                               <textarea name="description" id="" cols="65" rows="4"></textarea>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo Session::get('username'); ?>" class="medium" />

                                <input type="hidden" name="userid" class="medium" value="<?php echo Session::get('userId'); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Submit Post " />
                            </td>
                        </tr>
                    </table>
                    </form>
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