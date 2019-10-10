  <h1>Add Post</h1><hr>

<form action="<?php echo BASE_URL; ?>/Admin/" method="post">
  <table>
     <tr>
       <td><strong>Title</strong></td>
       <td><input type="text" name="name" placeholder="Enter post Title" required="1"></td>
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
           <option value="1">Category One</option>
         </select>
       </td>
     </tr>
     <tr>
       <td></td>
       <td><input type="submit" name="submit" value="Save"></td>
     </tr>
  </table>
</form>
