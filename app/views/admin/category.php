 <h1>Category List</h1><hr>
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
    		<th>Category Name</th>
    		<th>Category Title</th>
    		<th>Action</th>
    	</tr>
    <?php  $i = 0; foreach ($cat as $key => $value) { $i++ ?>
    	<tr>
    		<td><?php echo $i; ?></td>
    		<td><?php echo  $value['name']; ?></td>
    		<td><?php echo $value['title']; ?></td>
    		<td>
    			<a href="<?php echo BASE_URL; ?>/Admin/editCategory/<?php echo $value['id']; ?>">Edit</a> || 
    			<a href="<?php echo BASE_URL; ?>/Admin/delCategory/<?php echo $value['id']; ?>">Delete</a>

    		</td>
    	</tr>
    <?php } ?>
    </table> 
