<div class="row"></div>
<div class="row">VOUS ADMIN!</div>
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
                    <form>
                        
                        <span class="card-title"><div class="input-field col s6">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                            <label for="first_name">First Name</label>
                        </div><?php echo $v['name']; ?></span>
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
                    </form>
                </div>
                <div class="card-action">
                    <a href="#">S'incrire</a>
                    <a href="#">Poser une question</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
