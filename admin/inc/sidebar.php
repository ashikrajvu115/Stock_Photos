        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <?php  if(Session::get('userRole')== '1') { ?>
                       <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="copyright.php">Copyright</a></li>
                                
                            </ul>
                        </li>

                        
						<?php } ?>
                         
                         
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>