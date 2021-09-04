<div class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $title ?> Chat App</h5>
      <form action="<?= base_url('login_handle') ?>" method="post">
        <input type="hidden" name="type" value="Login" class="form-control shadow-none display-none">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control shadow-none" placeholder="email" id="email">
        </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" name="password" class="form-control shadow-none" placeholder="password" id="pwd">
        </div>
        <div class="mb-3"><span>Belum Punya Akun ? </span><a href="<?= base_url('register') ?>">Daftar</a></div>
        <div class="mb-3">
          <?php
           if(validation_errors()) {
             echo '<div class="alert alert-danger">
             <strong>Error!</strong> '.validation_errors().'
           </div>';
           }
          ?>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
    </div>
  </div>
</div>