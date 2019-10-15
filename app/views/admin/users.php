 <h1>User List</h1><hr>
 <?php

if (!empty($_GET['msg'])) {
   $msg = unserialize(urldecode($_GET['msg']));
   foreach ($msg as $keyss => $values) {
       echo "<span style='color:blue;font-weight: bold;'>".$values."</span>";
   }
}

?>
    <table class="tblone">
    	<tr>
    		<th>No</th>
    		<th>User Name</th>
    		<th>Level</th>
    		<th>Action</th>
    	</tr>
    <?php  $i = 0; foreach ($user as $key => $value) { $i++ ?>
    	<tr>
    		<td><?php echo $i; ?></td>
    		<td><?php echo  $value['username']; ?></td>
    		<td>
                <?php
                if ($value['level'] == 1) {
                    echo "Admin";
                } elseif($value['level'] == 2){
                    echo "Author";
                } elseif($value['level'] == 3){
                   echo "Contributor";
                }
                ?>
            </td>
    		<td>
    			<a href="<?php echo BASE_URL; ?>/User/editUser/<?php echo $value['id']; ?>">Edit</a> || 
    			<a onclick="return confirm('Are you sure to Delete!');" href="<?php echo BASE_URL; ?>/User/delUser/<?php echo $value['id']; ?>">Delete</a>

    		</td>
    	</tr>
    <?php } ?>
    </table> 
