  <h1>Add Category</h1><hr>
<?php 
  if (isset($catError)) {
     echo "<div style='color:red;border:1px solid red;padding:5px 10px;margin:5px;'>";
     foreach ($catError as $key => $value) {
       switch ($key) {
         case 'name':
           foreach ($value as $val) {
             echo "Category name: ".$val."<br>";
           }
           break;

           case 'title':
           foreach ($value as $val) {
             echo "Category Title: ".$val."<br>";
           }
           break;
         
         default:
           # code...
           break;
       }
     }
     echo "</div>";
  }
?>
<form action="<?php echo BASE_URL; ?>/Admin/insertCategory" method="post">
  <table>
     <tr>
       <td>Category Name</td>
       <td><input type="text" name="name" placeholder="Enter Category Name"></td>
     </tr>
     <tr>
       <td>Category Title</td>
       <td><input type="text" name="title" placeholder="Enter Category Title"></td>
     </tr>
     <tr>
       <td></td>
       <td><input type="submit" name="submit" value="Save"></td>
     </tr>
  </table>
</form>
