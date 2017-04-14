
<div class="row">
    <?php
    foreach($data['activities'] as $k => $v) {
    ?>
        <div class="col s6">
            <div class="card">
                <div class="card-image">
                    <img src="<?php echo ROOTURL."/logo.png"; ?>">
                    <span class="card-title"><?php echo $v['name']; ?></span>
                </div>
                <div class="card-content">
                    <span class="card-title"><?php echo $v['name']; ?></span>
                    <ul class="collapsible row" data-collapsible="expandable">
                        <li>
                            <div class="collapsible-header">
                                <i class="material-icons">filter_drama</i>Plus
                            </div>
                            <div class="collapsible-body">
                                <p>
                                    <?php echo $v['description']; ?>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header">
                                <i class="material-icons">filter_drama</i>Prix
                            </div>
                            <div class="collapsible-body">
                                <p>
                                    <?php echo $v['prix']; ?>€
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-action">
                    <a href="#!"><?php echo $v['prix']; ?>€</a>
                    <a href="#">S'incrire</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
