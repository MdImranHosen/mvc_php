  <h1>Add Category</h1><hr>

<form action="<?php echo BASE_URL; ?>/Admin/insertCategory" method="post">
  <table>
     <tr>
       <td>Category Name</td>
       <td><input type="text" name="name" placeholder="Enter Category Name" required="1"></td>
     </tr>
     <tr>
       <td>Category Title</td>
       <td><input type="text" name="title" placeholder="Enter Category Title" required="1"></td>
     </tr>
     <tr>
       <td></td>
       <td><input type="submit" name="submit" value="Save"></td>
     </tr>
  </table>
</form>
