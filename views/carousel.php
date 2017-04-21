<div class="row"></div>
<div class="row">
    <div class="col s12">
        <div class="carousel carousel-slider" id="carousel_1" data-indicators="true" style="border: 1px solid #c2242a">
            <?php
            foreach ($data['images'] as $key => $value) {
    	    ?>
    	        <a class="carousel-item" href="#!" >
                    <img src="<?php echo ROOTURL."/images/".$value["picture"]; ?>">
                </a>
    	    <?php
            }
            ?>
        </div>
        <a class="col s12 btn" href="<?php echo ROOTURL."/photos/"; ?>">Voir plus de photos</a>
    </div>
</div>
