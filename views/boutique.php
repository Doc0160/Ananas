<div class="row"><h1>BOUTIQUE</h1><div class="divider"></div></div>

<div class="row">

    <?php foreach($data['goodies'] as $k => $v) { ?>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo (is_null($v['picture'])) ? ROOTURL.'/logo.png' : ROOTURL.'/products/'.$v['picture']; ?>">
            </div>
            <div class="card-content">
                <span class="title"> <h5><?php echo $v['name']; ?></h5></span>
                <p><?php echo $v['description']; ?></p>
            </div>
            <div class="card-action">
                <span class="price">
                    <h3>
                        <?php echo (is_null($v['price'])) ? 'Non disponible' : $v['price'].'€'; ?></h3></span>
                <a href="#!not_a_real_link">commander</a>
            </div>
        </div>
    </div>
    <?php } ?>

</div>

