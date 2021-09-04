<div class="wrapper d-flex" id="wrapper">
  
  <div class="layout-left py-3 scrollers-list" style="overflow: hidden!important;">
    <div class="dropdown">
      <div class="font-weight-bold px-3">Tukar Akun</div>
      <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?= $user_active->avatar ?>" alt="" srcset="" class="avatar-md rounded-pill mr-2"> <span><?= $user_active->email ?></span>
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
    </div>
    <!-- <form class="d-flex pb-2 px-2" action="#">
      <input class="form-control rounded-pill mr-2 shadow-none" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary rounded-circle btn-flat" type="submit"><i class="fa fa-search"></i></button>
    </form> -->
    <ul class="list-group list" style="overflow: hidden!important;">
      <?php foreach($contacts as $row): if($row->id != $this->uri->segment(1) ):?>
      
      <li class="list-group-item align-items-stretch d-flex pb-0 pt-2 bg-transparent list-item-link px-2 <?= $user->id == $row->id ? 'chat-active': '' ?>" onClick="document.location.href='<?= base_url($this->uri->segment(1).'/chat/'.$row->id) ?>'">
        <img src="<?= $row->avatar ?>" alt="..." class="avatar-lg mr-2">
        <div class="d-flex flex-column divider pb-2 w-100">
          <div class="d-flex justify-content-between w-100">
            <div class="list-title text-capitalize"><?= $row->first_name ?> <?= $row->last_name ?></div>
            <div class="list-time" style="color: green;">Online</div>
          </div>
          <!-- <div class="list-text">
            laksdjfl iajsld kfjlaskdjfap iuashd;foihasdklhf lkasdjlfkjalsk d....
          </div> -->
        </div>
      </li>
      <?php endif; endforeach; ?>
    </ul>
  </div>

  <div class="layout-middle flex-grow-1 position-relative">
    <div class="banner p-2 banner-h">
      <div class="card-box d-flex align-items-center">
        <img src="<?= $user ? $user->avatar: 'https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png' ?>" alt="..." class="avatar-md mr-2">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <div class="list-title text-capitalize"><?= $user ? $user->first_name:'' ?></div>
          <div class="btn-group dropleft">
            <button type="button" class="btn btn-circle shadow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-ellipsis-v"></i>
            </button>
            <div class="dropdown-menu py-0">
              <button class="btn btn-light btn-flat btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" type="button"><i class="fa fa-info"></i> Info</button>
              <!-- <form action="<?= base_url('bersihkan_chat') ?>" method="post">
                <input type="hidden" name="sender" value="<?= $this->uri->segment(1) ?>">
                <input type="hidden" name="receiver" value="<?= $this->uri->segment(3) ?>">
                <button class="btn btn-light btn-flat btn-primary btn-block" type="submit"><i class="fa fa-trash"></i> Bersihkan</button>
              </form> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="scrollers position-relative">
      <ul class="list-group scroll-target w-100">
        <?php foreach($messages as $row): ?>
        <li class="list-group-item message-items <?php if($row->sender == $this->uri->segment(1)) echo 'text-right'; ?>">
          <span class="py-2 px-3 bg-default <?php if($row->receiver == $this->uri->segment(3)) echo 'bg-primary text-light'; ?>" style="border-radius: 7px;">
            <?= $row->text ?>
          </span>
        </li>
        <?php endforeach; ?>
        <?php if(sizeof($messages) == 0): ?>
        <li class="list-group-item message-items text-center">
          <span class="py-2 px-3 bg-default" style="border-radius: 7px;">
          Kirim Sesuatu ...
          </span>
        </li>
        <?php endif; ?>
      </ul>
    </div>
    <!-- <div class="banner inbox-form-detail p-2 position-fixed" style="display: none;">
      <div class="alert alert-light file-info"></div>
    </div> -->
    <div class="banner inbox-form p-2 position-fixed">
      <form class="d-flex form-h" action="<?= base_url('send_chat') ?>" method="post">
        <!-- <button class="btn btn-flat rounded-circle" type="button" onClick="openInputFile()"><i class="fa fa-file-o"></i></button> -->
        <!-- <input type="file" name="file" id="input-file" style="display: none;"> -->
        <input type="hidden" name="sender" value="<?= $this->uri->segment(1) ?>">
        <input type="hidden" name="receiver" value="<?= $this->uri->segment(3) ?>">
        <input name="message" class="form-control shadow-none rounded-pill mx-2 flex-grow-0" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-flat btn-primary rounded-circle" type="submit"><i class="fa fa-paper-plane-o"></i></button>
      </form>
    </div>
  </div>

  <div class="layout-right flex-grow-1 p-3"></div>

</div>

<?php $this->load->view('components/modal', ['user' => $user]) ?>
<?php $this->load->view('components/confirmation') ?>

<script>
let n = document.getElementById('navbar-setup');
let body_content = document.getElementById('wrapper');
let banner_height = document.querySelector('.banner-h');
let form_height = document.querySelector('.form-h');
let scroll = document.querySelector('.scrollers');
let scroll_target = document.querySelector('.scroll-target');
let scroll_items = document.querySelectorAll('.message-items');
setTimeout(function () {
  body_content.style.height = 'calc(100vh-'+n.offsetHeight+'px)'
  // scroll_target.style.marginTop = 'auto!important'
  // scroll_target.style.marginBottom = '0!important'

  scroll_height = 'calc(100vh - '+n.offsetHeight+'px - '+banner_height.offsetHeight+'px - '+50+'px)'
  scroll.style.height = scroll_height
  scroll_target.style.position = 'absolute'
  scroll_target.style.bottom = 0
  scroll_target.style.maxHeight = scroll_height;
  scroll_target.style.overflowY = 'scroll'
  scroll_items[scroll_items.length-1].scrollIntoView(false)
}, 0)

let scroll_list = document.querySelector('.scrollers-list');
let scroll_target_list = document.querySelector('.scrollers-target-list');
setTimeout(function () {
  scroll_height_list = 'calc(100vh - '+n.offsetHeight+'px - '+banner_height.offsetHeight+'px - '+50+'px)'
  scroll_list.style.height = scroll_height
  scroll_target_list.style.maxHeight = scroll_height;
  scroll_target_list.style.overflowY = 'scroll'
}, 0)

let file_temp = null;
let input_el = document.querySelector('#input-file');
let info_el = document.querySelector('.file-info');
let input_detail = document.querySelector('.inbox-form-detail');
function openInputFile() {
  input_el.click()
}
input_el.addEventListener('change', function(e) {
  let infos = e.target.files;
  if(infos.length > 0) {
    file_temp = infos[0]
    input_detail.style.bottom = form_height.offsetHeight+'px';
    input_detail.style.display = 'block'
    console.log(file_temp)
    info_el.innerHTML = '<button type="button" class="close" onClick="closeMsgBtn()">&times;</button><strong>'+file_temp.name+'</strong>'
  }
})
function closeMsgBtn() {
  input_detail.style.display = 'none'
  file_temp = null
}

let app = null

function run() {
  app = setTimeout(run, 5000)
}

setTimeout(function() {
  run()
}, 5000)

</script>

<!-- REST -->
<script>
  // let datas = {
  //   'contact-message': []
  // }
  // $(document).ready(function() {
  //   $.ajax({
  //     method: 'get',
  //     url: "<?= base_url('/fetch_contact_messages'); ?>", 
  //     success: function(result){
  //       datas['contact_message'] = result.msg_contact.data
  //       // Render List Item
  //       let contact = $('#contact-item');
        
  //       $.each(result.msg_contact.data, function(i, item) {
  //         let item_el = $('<li class="list-group-item align-items-stretch d-flex pb-2 pt-2 bg-transparent list-item-link px-2 chat-item" />')
  //         let avatar = '<img src="data:image/png;base64,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" alt="..." class="avatar-lg mr-2" />' 
          
  //         let i_w = $('<div class="d-flex flex-column divider pb-2 w-100" />')
  //         let i_w2 = $('<div class="d-flex justify-content-between w-100" />')
  //         let title = $('<div class="list-title text-capitalize" />')
  //         title.text(item.name)
  //         let time = $('<div class="list-time" style="color: green;" />').text('Online')
  //         let msg = $('<div class="list-text" />').text('Hello saya '+item.name+' ...')
  //         item_el.append(avatar)
          
  //         i_w2.append(title)
  //         i_w2.append(time)
  //         i_w.append(i_w2)
  //         i_w.append(msg)
  //         item_el.append(i_w)
  //         contact.append(item_el)
  //         console.log(contact)
  //       })
  //       console.log(result.msg)
  //   }});
  // })
</script>