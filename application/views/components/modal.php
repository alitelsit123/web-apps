<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Profile Info</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <div class="card">
            <img src="<?= $user->avatar ?>" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center"><?= $user->first_name ?> <?= $user->last_name ?></h5>
              <p class="card-text text-center">
                <btn class="btn btn-info"><?= $user->email ?></btn>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>