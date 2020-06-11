<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Website Settings</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
              <?php 
    include('config.php');
  
    $sql = "SELECT * FROM settings";

    $result = mysqli_query($conn,$sql) or die('query failed');
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    
    ?>
                  <!-- Form -->
                  <form  action="save-settings.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Website Name</label>
                          <input type="text" name="post_title" value="<?php echo $row['websitename']; ?>" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">website logo</label>
                          <input type="file" name="logo" required>
                          <img  src="images/<?php echo $row['logo']; ?>" height="150px">
                          <input type="hidden" name="old-image" value="<?php echo $row['logo']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Footer Description</label>
                          <textarea name="postdesc"  class="form-control" rows="5"  required value=""><?php echo $row['footerdesc']; ?></textarea>
                      </div>
                      
                      
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
                  <?php
        }
    }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
