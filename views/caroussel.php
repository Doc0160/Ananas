<div class="row">
    <div class="carousel carousel-slider" data-indicators="true">
        <?php
        foreach ($data['images'] as $key => $value) {
    	?>
    	    <a class="carousel-item" href="#one!">
                <img src="<?php echo ROOTURL."/images/".$value["picture"]; ?>">
            </a>
    	<?php
        }
        ?>
    </div>
</div>
