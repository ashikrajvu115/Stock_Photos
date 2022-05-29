<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
<?php
    if (Session::get('userRole') != '1' ) {
      echo "<script>window.location = 'index.php'; </script>";
     } 
 ?>
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php
                if (isset($_GET['seenmsg'])) {
                	$seenmsg=$_GET['seenmsg'];
              
                $query="UPDATE tbl_contact set  status='1' where id ='$seenmsg'";
                $update_row=$bd->update($query);
                if ($update_row) {
                	echo "Message sent seen box";
                }else{
                	echo "Message not sent seen box";
                }
            }
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">Serial No.</th>
							<th width="20%">Name</th>
							<th width="20%">Email</th>
							<th  width="25%">Message</th>
							<th width="10%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query="SELECT * from tbl_contact where status='0' order by id desc";
							$msgselect=$bd->select($query);
							if ($msgselect) {
								$i=0;
								while ($result=$msgselect->fetch_assoc()) {
									$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['fastname'].' '.$result['lastname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->textshorten($result['body'],60); ?></td>
							<td><?php echo $result['datetime']; ?></td>
							<td>
							 <a onclick="return confirm('Are you sure to View Message !!');" href="viewmsg.php?view_msgid=<?php echo $result['id'];?>">View</a> ||
							 <a onclick="return confirm('Are you sure to Reply Message !!');" href="reply.php?replymsg=<?php  echo $result['id']; ?>">Reply</a>||
							 <a onclick="return confirm('Are you sure to Seen Message !!');" href="?seenmsg=<?php  echo $result['id']; ?>">Seen</a></td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
               </div>
            </div>

             <div class="box round first grid">
                <h2>Seen Message</h2>
                <?php
                if (isset($_GET['delete_msgid'])) {
                	$delete_msgid=$_GET['delete_msgid'];
              
                $query="DELETE from tbl_contact where id ='$delete_msgid'";
                $delete_row=$bd->delete($query);
                if ($delete_row) {
                	echo "Message delete success from seen box";
                }else{
                	echo "Message delete not success from seen box";
                }
            }
                ?>

                <?php
                if (isset($_GET['unseen_msgid'])) {
                	$unseen_msgid=$_GET['unseen_msgid'];

                	$query="UPDATE tbl_contact set  status='0' where id ='$unseen_msgid'";
                	$update_row=$bd->update($query);
                	if ($update_row) {
                		echo "Message Unseen Successfuly";

                	}else{
                		echo  "Message Unseen not Success";

                	}
                }
                ?>



                <div class="block">        
                   <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">Serial No.</th>
							<th width="20%">Name</th>
							<th width="20%">Email</th>
							<th  width="25%">Message</th>
							<th width="10%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query="SELECT * from tbl_contact where status='1' order by id desc";
							$msgselect=$bd->select($query);
							if ($msgselect) {
								$i=0;
								while ($result=$msgselect->fetch_assoc()) {
									$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['fastname'].' '.$result['lastname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $fm->textshorten($result['body'],60); ?></td>
							<td><?php echo $result['datetime']; ?></td>
							<td>
							 <a onclick="return confirm('Are you sure to View Message !!');" href="viewmsg.php?view_msgid=<?php echo $result['id'];?>">View</a> || 
							 <a onclick="return confirm('Are you sure to delete message !!');" href="?delete_msgid=<?php echo $result['id'];?>">Delete</a> || 
							 <a onclick="return confirm('Are you sure to Unseen message !!');" href="?unseen_msgid=<?php echo $result['id'];?>">Unseen</a>
							</td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>

            <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
<?php include 'inc/footer.php';?>