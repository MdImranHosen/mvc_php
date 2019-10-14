  <h1>Add Post</h1><hr>
<?php 
  if (isset($postError)) {
    echo "<div style='color:red;border:1px solid red;padding:5px 10px;margin:5px;'>";
     foreach ($postError as $key => $value) {
        switch ($key) {
          case 'title':
            foreach ($value as $val) {
             echo $title_err = "Title: ".$val."<br>";
            }
            break;

            case 'content':
            foreach ($value as $val) {
              echo "Content: ".$val."<br>";
            }
            break;
            case 'cat':
            foreach ($value as $val) {
              echo "Category: ".$val."<br>";
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
<?php 
 foreach ($postbyid as $keypost => $postvalue) {
?>
<form action="<?php echo BASE_URL; ?>/Admin/updatePost/<?php echo $postvalue['id']; ?>" method="post">
  <table>
     <tr>
       <td><strong>Title</strong></td>
       <td><input id="posttitle" type="text" name="title" value="<?php echo $postvalue['title']; ?>"></td>
     </tr>
     <tr>
       <td><strong> Content </strong></td>
       <td>
        <textarea name="content"><?php echo $postvalue['content']; ?></textarea>
        <br>
       </td>
     </tr><br>
     <tr>
       <td><strong>Category</strong></td>
       <td>
         <select name="cat" class="cat">
           <?php 
              foreach ($catlist as $catkey => $catvalue) {
           ?>
           <option
           <?php  if ($postvalue['cat'] == $catvalue['id']) { ?>
                selected="selected"
            <?php  } ?>
            value="<?php echo $catvalue['id']; ?>"><?php echo $catvalue['name']; ?></option>
           <?php  } ?>
         </select>
       </td>
     </tr>
     <tr>
       <td></td>
       <td><input type="submit" name="submit" value="Update"></td>
     </tr>
  </table>
</form>
<?php } ?>