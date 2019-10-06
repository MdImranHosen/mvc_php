    <article class="post">
        <?php 
          if(isset($postbyid)){

            foreach ($postbyid as $value) {           
        ?>
     	<div class="postcontent">
            <div class="details">
                <div class="title">
                    <h2><?php echo $value['title']; ?></h2>
                    <p>Category: <a href="<?php echo BASE_URL.'/Index/postByCat/'.$value['cat']; ?>"><?php echo $value['name']; ?></a></p>
                </div>
                <div class="desc">
                    <p><?php echo $value['content']; ?></p>
                </div>
            </div>
     	</div>
        <?php } } ?>
     	
     </article>
  
