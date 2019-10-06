<div class="searchoption">
	<div class="menu">
		<a href="<?php echo BASE_URL; ?>">Home</a>
	</div>
	<div class="search">
		<form action="<?php echo BASE_URL; ?>/Index/search" method="post">
			<input type="text" placeholder="Search Here.." name="keyword">

			<select class="catsearch" name="cat">
				<option style="display: none;" value="">Select Category</option>
				<?php 
                  foreach ($catlist as $key => $value) {
				?>
				<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
			   <?php } ?>
			</select>

			<button class="submitbtn" type="submit">Search</button>
		</form>
	</div>
</div>
