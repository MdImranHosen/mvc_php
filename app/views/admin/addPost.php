  <h1>Add Post</h1><hr>

<form action="<?php echo BASE_URL; ?>/Admin/addNewPost" method="post">
  <table>
     <tr>
       <td><strong>Title</strong></td>
       <td><input id="posttitle" type="text" name="title" placeholder="Enter post Title" required="1"></td>
     </tr>
     <tr>
       <td colspan="2">
        <strong> Content </strong> <br>
        <textarea name="content" placeholder="Enter text Article."></textarea>
        <br>
       </td>
     </tr><br>
     <tr>
       <td><strong>Category</strong></td>
       <td>
         <select name="cat" class="cat">
           <option value="" style="display: none;">Select Category.</option>
           <?php 
              foreach ($catlist as $catkey => $catvalue) {
           ?>
           <option value="<?php echo $catvalue['id']; ?>"><?php echo $catvalue['name']; ?></option>
           <?php  } ?>
         </select>
       </td>
     </tr>
     <tr>
       <td></td>
       <td><input type="submit" name="submit" value="Save"></td>
     </tr>
  </table>
</form>
