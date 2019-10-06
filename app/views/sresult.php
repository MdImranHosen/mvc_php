 <article class="post">
        <?php 
          if(isset($postbysearch)){
             if(!empty($postbysearch)){

            foreach ($postbysearch as $value) {            
        ?>
     	<div class="postcontent">
     		<h2><a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h2>
     		<p><?php 

             $text = $value['content'];
             if(strlen($text) > 200){
               $text = substr($text, 0, 200);
               echo $text."...";
             }else{
                echo $text;
             }

            ?></p>
     		<div class="readmore">
     			<a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['id']; ?>">Read More</a>
     		</div>
     	</div>
        <?php }  } else{ echo "<center><h3> No Result </h3></center>"; } } else{ echo "<center><h3> No Result </h3></center>"; } ?>
     	
     </article>
  
