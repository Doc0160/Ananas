  <?php
    if (strlen($data[0]['description']) > 100){
        $desc_1 = substr($data[0]['description'], 0, 100) . ('...');
    }
    else{
        $desc_1 = $data[0]['description'];
    }

    if (strlen($data[1]['description']) > 100){
        $desc_2 = substr($data[1]['description'], 0, 100) . ('...');
    }
    else{
        $desc_2 = $data[1]['description'];
    }

    if (strlen($data[2]['description']) > 100){
        $desc_3 = substr($data[1]['description'], 0, 100) . ('...');
    }
    else{
        $desc_3 = $data[2]['description'];
    }

    if (!empty($data[0]['picture'])){
        $pic_1 = ROOTURL."/products/".$data[0]['picture'];
    }
    else{
        $pic_1 = ROOTURL."/logo.png";
    }

    if (!empty($data[1]['picture'])){
        $pic_2 = ROOTURL."/products/".$data[1]['picture'];
    }
    else{
        $pic_2 = ROOTURL."/logo.png";
    }

    if (!empty($data[2]['picture'])){
        $pic_3 = ROOTURL."/products/".$data[2]['picture'];
    }
    else{
        $pic_3 = ROOTURL."/logo.png";
    }
  ?>

  <div class="row">
      <div class="col s12">

          <div class="col s12 l4">
              <div class="card hoverable">
                  <div class="card">
                      <div class="card-image">
                          <img class="materialboxed" alt="photo" src="<?php echo $pic_1; ?>">
                          <a href="<?php echo ROOTURL."/shop/"; ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                      </div>
                      <div class="card-content">
                          <h5><?php echo $data[0]['name']; ?></h5>
                          <p><?php echo $desc_1; ?></p>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col s12 l4">
              <div class="card hoverable">
                  <div class="card">
                      <div class="card-image">
                          <img class="materialboxed" alt="photo" src="<?php echo $pic_2; ?>">
                          <a href="<?php echo ROOTURL."/shop/"; ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                      </div>
                      <div class="card-content">
                          <h5><?php echo $data[1]['name']; ?></h5>
                          <p><?php echo $desc_2; ?></p>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col s12 l4">
              <div class="card hoverable">
                  <div class="card">
                      <div class="card-image">
                          <img class="materialboxed" alt="photo" src="<?php echo $pic_3; ?>">
                          <a href="<?php echo ROOTURL."/shop/"; ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                      </div>
                      <div class="card-content">
                          <h5><?php echo $data[2]['name']; ?></h5>
                          <p><?php echo $desc_3; ?></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>  
