<div class="row"></div>
<?php if($data['session']->has_data() &&
         Bitfield::has($data['session']->permissions, PERMISSION_MODIFY_ACTIVITY)) { ?>
<div class="row">
    <a href="<?php echo ROOTURL."/activities/admin/"; ?>" class="btn col s12">ADMIN</a>
</div>
<?php } ?>
<div class="row">
    <?php
    foreach($data['activities'] as $k => $v) {
    ?>
        <div class="col s6">
            <div class="card">
                <div class="card-image">
                    <img class="materialboxed" src="<?php echo ROOTURL."/logo.png"; ?>">
                    <span class="card-title"><?php echo $v['name']; ?></span>
                </div>
                <div class="card-content">
                    <span class="card-title">
                        <?php echo $v['name'].", le ".
                                   date("d/m/Y à H:i:s", $v['timestamp']); ?>
                    </span>
                    <ul class="collapsible row" data-collapsible="expandable">
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
                    </ul>
                </div>
                <?php if($data['session']->has_data() &&
                         Bitfield::has($data['session']->permissions, PERMISSION_PARTICIPATE_ACTIVITY)) { ?>
                <div class="card-action">
                    <?php if($v['inscrit']) { ?>
                        <a href="<?php echo ROOTURL.'/activities/disinscription/'.$v['id'].'/'; ?>">
                            Se desincrire
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo ROOTURL.'/activities/inscription/'.$v['id'].'/'; ?>">
                            S'incrire
                        </a>
                    <?php } ?>
                    <a href="mailto:contact@cesi.fr">Poser une question</a>
                </div>
                <?php } ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>
