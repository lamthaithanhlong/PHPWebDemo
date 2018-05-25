<div class="col-md-6">

<h3>Login</h3>
<form class="form" action="login.php" method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="" name="name" placeholder="name">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="" placeholder="password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>
</div>

<div class="col-md-6" style="border-left: 1px solid white;">
  <h3>Create a new account</h3>
  <form class="form" action="createUser.php" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="" placeholder="" name="name">
    </div>
    <div class="form-group">
      <label for="name">User Name</label>
      <input type="text" class="form-control" id="" placeholder="" name="uid">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="" placeholder="" name="email">
    </div>
    <div class="form-group">
      <label for="pw1">Password</label>
      <input type="password" class="form-control" id="" placeholder="" name="pw1">
    </div>
    <div class="form-group">
      <label for="pw2">Confirm Passpword</label>
      <input type="password" class="form-control" id="" placeholder="" name="pw2">
    </div>
    <button type="submit" name="create_account" class="btn btn-success">Create Account</button>
  </form>
</div>
