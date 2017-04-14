<div class="row">
    <?php
    foreach($data['photos'] as $k => $v) {
        if($k % 3 == 0) {
    ?>
</div>
<div class="row">
    <?php             
    }
    ?>
    <div class="col s4">
        <div class="card hoverable">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL."/images/".$v["picture"]; ?>">
            </div>
            <!-- <div class="card-content">
                 <?php var_dump($v); ?>
                 </div> -->
            <div class="card-action">
                <a href="#">Like</a>
                <a href="#">Dislike</a>
                <a href="<?php echo ROOTURL."/images/".$v["picture"]; ?>"
                   download="<?php echo $v["picture"]; ?>">Download</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
