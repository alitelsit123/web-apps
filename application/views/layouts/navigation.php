<nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbar-setup">
  <a class="navbar-brand" href="#"><?= $title ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <ul class="navbar-nav w-100 text-center" style="float: right!important;">
    <!-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?= $user_active->avatar ?>" alt="" srcset="" class="avatar-md rounded-pill"> <span><?= $user_active->email ?></span>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php
        $segment = $this->uri->segment(1);
        foreach($contacts as $u) {
          if($u->id !== $user_active->id) {
            echo '<a class="dropdown-item" href="'.base_url($u->id.'/chat/'.$user_active->id).'">'.$u->email.'</a>';
          }
        }
        ?>
      </div>
    </li> -->
  </ul>
  <form class="form-inline my-2 my-lg-0">
    <button class="btn text-light my-2 my-sm-0" type="button" onClick="document.location.href = '<?= base_url('login') ?>'">Logout</button>
  </form>
</nav>