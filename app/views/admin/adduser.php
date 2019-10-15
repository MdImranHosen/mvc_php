  <h1>Add User</h1><hr>
<?php 
  if (isset($userError)) {
     echo "<div style='color:red;border:1px solid red;padding:5px 10px;margin:5px;'>";
     foreach ($userError as $key => $value) {
       switch ($key) {
         case 'username':
           foreach ($value as $val) {
             echo "Username: ".$val."<br>";
           }
           break;

           case 'password':
           foreach ($value as $val) {
             echo "Password: ".$val."<br>";
           }
           break;

           case 'level':
           foreach ($value as $val) {
             echo "Level: ".$val."<br>";
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
<form action="<?php echo BASE_URL; ?>/User/insertUser" method="post">
  <table>
     <tr>
       <td>User Name </td>
       <td><input type="text" name="username" placeholder="Enter User Name"></td>
     </tr>
     <tr>
       <td>Password </td>
       <td><input type="text" name="password" placeholder="Enter Password"></td>
     </tr>
     <tr>
       <td>Level </td>
       <td>
         <select name="level" class="cat">
           <option style="display: none;" value="0">Select User Level</option>
           <option value="2">Author</option>
           <option value="3">Contributor</option>
         </select>
       </td>
     </tr>
     <tr>
       <td></td>
       <td><input type="submit" name="submit" value="Add User"></td>
     </tr>
  </table>
</form>
