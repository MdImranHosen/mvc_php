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
<form action="<?php echo BASE_URL; ?>/Admin/addNewPost" method="post">
  <table>
     <tr>
       <?php
       /* if (!empty($title_err)) {
          echo "<span style='color:white;background-color:red;padding:5px 10px;'>".$title_err."</span>";
        }*/
        ?>
       <td><strong>Title</strong></td>
       <td><input id="posttitle" type="text" name="title" placeholder="Enter post Title"></td>
     </tr>
     <tr>
       <td><strong> Content </strong></td>
       <td>
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
