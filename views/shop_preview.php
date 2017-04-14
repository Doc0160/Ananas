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
        $pic_1 = ROOTURL."/images/".$data[0]['picture'];
    }
    else{
        $pic_1 = ROOTURL."/logo.png";
    }

    if (!empty($data[1]['picture'])){
        $pic_2 = ROOTURL."/images/".$data[1]['picture'];
    }
    else{
        $pic_2 = ROOTURL."/logo.png";
    }

    if (!empty($data[2]['picture'])){
        $pic_3 = ROOTURL."/images/".$data[2]['picture'];
    }
    else{
        $pic_3 = ROOTURL."/logo.png";
    }
?>

  <div class="row">
    <div class="col s12">

      <div class="col s4">
        <div class="card hoverable">
          <div class="card">
            <div class="card-image">
              <img src="<?php echo $pic_1; ?>">
              <span class="card-title"><?php echo $data[0]['name']; ?></span>
              <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p><?php echo $desc_1; ?></p>
            </div>
            </div>
          </div>
        </div>

        <div class="col s4">
          <div class="card hoverable">
            <div class="card">
              <div class="card-image">
                <img src="<?php echo $pic_2; ?>">
                <span class="card-title"><?php echo $data[1]['name']; ?></span>
                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <p><?php echo $desc_2; ?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="col s4">
          <div class="card hoverable">
            <div class="card">
              <div class="card-image">
                <img src="<?php echo $pic_3; ?>">
                <span class="card-title"><?php echo $data[2]['name']; ?></span>
                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <p><?php echo $desc_3; ?></p>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>  
