  <h1>UI Option</h1><hr>
<?php

if (!empty($_GET['msg'])) {
   $msg = unserialize(urldecode($_GET['msg']));
   foreach ($msg as $keyss => $values) {
       echo "<span style='color:blue;font-weight: bold;'>".$values."</span>";
   }
}

?>
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
<form action="<?php echo BASE_URL; ?>/Admin/changeui" method="post">
  <table>
     <tr>
       <td>Change Background Color </td>
       <td><input type="color" name="color" value="<?php foreach ($color as $keys => $values) { echo $values['color'];  } ?>"></td>
     </tr>
     <tr>
       <td></td>
       <td><input type="submit" name="submit" value="Save"></td>
     </tr>
  </table>
</form>
