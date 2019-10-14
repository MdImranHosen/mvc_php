<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<h2>Article List</h2>
 <?php

if (!empty($_GET['msg'])) {
   $msg = unserialize(urldecode($_GET['msg']));
   foreach ($msg as $keyss => $values) {
       echo "<span style='color:blue;font-weight: bold;'>".$values."</span>";
   }
}

?>
<table id="tableone" class="display" data-order='[[0,"desc"]]' data-page-length='2'>
	<thead>
		<tr>
			<th width="2%">No</th>
			<th width="25%">Title</th>
			<th width="35%">Content</th>
			<th width="20%">Category</th>
			<th width="15%">Action</th>
		</tr>
	</thead>
	<tbody>
      <?php 
         $i = 0;
          foreach ($listpost as $key => $value) {
          	$i++;
      ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $value['title']; ?></td>
			<td>
			<?php 
			 $text = $value['content'];
             if(strlen($text) > 45){
               $text = substr($text, 0, 45);
               echo $text."...";
             }else{
                echo $text;
             }
			?>
			</td>
			<td>
				<?php
				 foreach ($catlist as $keys => $cat) {
				 	if (($cat['id']) == ($value['cat'])) {
				 		echo $cat['name'];
				 	}
				 }
				 ?>
		    </td>
			<td>
    			<a href="<?php echo BASE_URL; ?>/Admin/editArticle/<?php echo $value['id']; ?>">Edit</a> || 
    			<a onclick="return confirm('Are you sure to Delete!');" href="<?php echo BASE_URL; ?>/Admin/delArticle/<?php echo $value['id']; ?>"> Delete</a>

    		</td>
			</td>
		</tr>
       <?php } ?>
	</tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
    $('#tableone').DataTable();
} );
</script>