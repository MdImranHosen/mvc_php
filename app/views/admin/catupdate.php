   <h1> Update Category </h1><hr>
     <?php

      if(isset($msg)) { echo "<span style='color:blue;font-weight: bold;'>".$msg."</span>"; } 

      ?>
   <?php 
        if(isset($categoryData)) {

         foreach($categoryData as $value){
         ?>
        <form action="<?php echo BASE_URL; ?>/Admin/updateCat/<?php echo $value['id']; ?>" method="post">
          <table>
             <tr>
               <td>Category Name</td>
               <td><input type="text" name="name" value="<?php echo $value['name']; ?>" required="1"></td>
             </tr>
             <tr>
               <td>Category Title</td>
               <td><input type="text" name="title" value="<?php echo $value['title']; ?>" required="1"></td>
             </tr>
             <tr>
               <td></td>
               <td><input type="submit" name="submit" value="Update"></td>
             </tr>
             
          </table>
        </form>
     <?php } } ?>