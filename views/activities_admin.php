<div class="row"></div>
<div class="row">VOUS ADMIN!</div>
<div class="row">
    <?php
    foreach($data['activities'] as $k => $v) {
    ?>
        <div class="col s6">
            <div class="card">
                <form method="post">
                    <div class="card-image">
                        <img src="<?php echo ROOTURL."/logo.png"; ?>">
                        <span class="card-title"><?php echo $v['name']; ?></span>
                    </div>
                    <?php if(Bitfield::has($data['session']->permissions, PERMISSION_MODIFY_ACTIVITY)) { ?>
                        <div class="card-content">
                            <div class="row">
                                <div class="switch">
                                    <label>
                                        Off
                                        <input name="visible" type="checkbox"
                                               <?php echo (bool)$v['visible'] ? 'checked="checked"' : ''; ?>>
                                        <span class="lever"></span>
                                        On
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <input type="hidden" name="id" value="<?php echo $v['id']; ?>">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" name="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <span class="card-title">
                                    <div class="input-field col s12">
                                        <input placeholder="Placeholder"
                                               id="first_name" type="text"
                                               class="validate" name="name"
                                               value="<?php echo $v['name']; ?>">
                                        <label for="first_name">Nom</label>
                                    </div>
                                </span>
                            </div>
                            <div class="row">
                                <span class="card-title">
                                    <div class="input-field col s12">
                                        <input placeholder="Placeholder"
                                               id="price" type="number"
                                               class="validate" name="price"
                                               step="0.01"
                                               value="<?php echo $v['prix']; ?>">
                                        <label for="price">Prix(€)</label>
                                    </div>
                                </span>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="textarea1" name="description"
                                              class="materialize-textarea"><?php echo $v['description']; ?></textarea>
                                    <label for="textarea1">Description</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="date" type="date" name="date"
                                           class="datepicker"
                                           value="<?php echo date('d F, Y', $v['timestamp']); ?>">
                                    <label for="date">Date de l'événement</label>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card-action">
                        <div class="input-field" style="margin: 10px">
                            <?php if(Bitfield::has($data['session']->permissions, PERMISSION_MODIFY_ACTIVITY)) { ?>
                                <input type="submit" class="btn" value="Modifier">
                            <?php }
                                  if(Bitfield::has($data['session']->permissions, PERMISSION_DELETE_ACTIVITY)) { ?>
                                <input type="submit" class="btn" value="Supprimer">
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</div>
