<?php require_once './init.php'; ?>
<?php require_once './partials/_header.php'; ?>

<?php 

if(isset($_POST['submit'])) {
  $validation = new UserValidator($_POST); 
  $errors = $validation->validate_form();

}

?>


<div class="container">
  <h3 class="text-center text-secondary pt-3">OOP Validation</h3>
  <hr>
  <div class="d-flex justify-content-center">
    <div class="col-12 col-sm-10 col-md-6 pt-4">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="shadow form-group">
          <label for="name">User Name</label>
          <input 
            type="text" 
            class="shadow-sm form-control" 
            id="username" 
            name="username" 
            aria-describedby=""
            value="<?php echo $_POST['username'] ?? '' ?>"
          >
          <small class="error form-text text-danger">
            <?php echo $errors['username'] ?? ' ' ?>
          </small>
        </div>        
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input 
            type="text" 
            class="shadow-sm form-control" 
            id="email" 
            name="email" 
            aria-describedby="emailHelp"
            value="<?php echo $_POST['email'] ?? '' ?>"
          >
          <small class="error form-text <?php echo $errors['email'] ? 'text-danger' : 'text-muted' ?> ">
            <?php echo $errors['email'] ?? "We'll never share your email with anyone else." ?>
          </small>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <!-- 
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="shadow-sm form-control" id="password" name="password">
        </div> 
        -->
        <!-- 
        <div class="form-group">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" class="shadow-sm form-control" id="confirm_password" name="confirm_password">
        </div>         
        -->
        <div class="text-right">
          <button type="submit" class="border-0 shadow btn btn-success" name="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once './partials/_footer.php'; ?>