<div class="row">
    <div class="carousel carousel-slider" data-indicators="true">
    <?php

    foreach ($data['images'] as $key => $value) 
    {
    	?>
    	<a class="carousel-item" href="#one!"><img src="<?php echo ROOTURL."/images/".$value["picture"]; ?>"></a>
    	<?php
    }

    ?>
    <!--<a class="carousel-item" href="#one!"><img src="<?php echo ROOTURL; ?>/images/babe_1.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="<?php echo ROOTURL; ?>/images/babe_2.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="<?php echo ROOTURL; ?>/images/babe_3.jpg"></a>
    <a class="carousel-item" href="#four!"><img src="<?php echo ROOTURL; ?>/images/babe_4.jpg"></a>-->
  </div>
</div>