   <aside class="sidebar">
     	<div class="widget">
     		<h2>Category</h2>
     		<ul>
                <?php 
                  foreach ($catlist as $key => $value) {
                ?>
     			<li><a href="<?php echo BASE_URL.'/Index/postByCat/'.$value['id']; ?>"><?php echo $value['name']; ?></a></li>
               <?php } ?>
     		</ul>
     	</div>
        <div class="widget">
            <h2>Recent Post List</h2>
            <ul>
                <?php 
                  foreach ($newpost as $keys => $values) {
                ?>
                <li><a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $values['id']; ?>"><?php echo $values['title']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
     </aside>