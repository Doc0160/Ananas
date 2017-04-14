<div class="row"></div>
<div class="row">VOUS ADMIN!</div>
<div class="row">
    <?php
    foreach($data['activities'] as $k => $v) {
    ?>
        <div class="col s6">
            <div class="card">
                <form>
                    <div class="card-image">
                        <img src="<?php echo ROOTURL."/logo.png"; ?>">
                        <span class="card-title"><?php echo $v['name']; ?></span>
                    </div>
                    <div class="card-content">
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
                                           id="first_name" type="number"
                                           class="validate" name="price"
                                           value="<?php echo $v['prix']; ?>">
                                    <label for="first_name">Prix(€)</label>
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
                                <input type="date" class="datepicker">
                                <label for="textarea1">Date de l'événement</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="#">S'incrire</a>
                        <a href="#">Poser une question</a>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</div>
