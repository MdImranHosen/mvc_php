
   <a href="<?php echo BASE_URL; ?>"> Home</a>
    <hr>
     <article class="post">
        <?php 
          if(isset($postbycats)){

            foreach ($postbycats as $value) {            
        ?>
     	<div class="postcontent">
     		<div class="title">
                <h2><a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h2>
                <p>Category: <?php echo $value['name']; ?></p>
            </div>
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
        <?php } } ?>
     	
     </article>
  
