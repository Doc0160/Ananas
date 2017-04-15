<div class="row">
    <?php
    foreach($data['results'] as $k => $v) {
        if (empty($v['picture'])){
            $v['picture'] = ROOTURL."/logo.png";
        }
        if (strlen($v['description']) > 400){
            $v['description'] = substr($v['description'], 0, 400) . ('...');
        }
    ?>
    <div class="col l6 m12">
        <div class="card hoverable">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo $v['picture']; ?>">
                <span class="card-title"><?php echo $v['name'] ; ?></span>
            </div>
            <div class="card-content">
                <p><?php echo $v['description']; ?></p>
            </div>
            <div class="card-action">
                <a href="<?php echo ROOTURL."/activities/"; ?>">Voir l'activité correspondante</a>
            </div>
        </div>
    </div>
<?php } ?>
</div>
