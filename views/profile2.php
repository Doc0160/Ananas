
<div class="row">

    <div class="col s6 offset-s3">
        <h1>PROFILE</h1>
        <div class="divider"></div>
        <div class="row">
            <div class="col s6">Pseudo: </div>
            <div class="col s6"><?php echo $data['username']; ?></div>
        </div>
        <div class="row">
            <div class="col s6">Nom:</div>
            <div class="col s6"><?php echo $data['name']; ?></div>
        </div>
        <div class="row">
            <div class="col s6">Mail:</div>
            <div class="col s6"><?php echo $data['email']; ?></div>
        </div>
        <div class="row">
            <div class="col s6"><?php echo $data['avatar']; ?></div>
        </div>
        <div class="row">
            <div class="col s6">Groupe:</div>
            <div class="col s6"><?php echo $data['groupe']; ?></div>
        </div>
        <div class="row">
            <div class="col s6">
                <select>
                    <?php foreach($data['groupes'] as $k => $v) { ?>
                        <option <?php echo ($v['id']==$data['id_groupe']) ? 'selected' : '' ; ?>>
                            <?php echo $v['name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col s6"><?php echo $data['groupe']; ?></div>
        </div>
        <div class="row">
            <div class="col s6">Inscrit le: </div>
            <div class="col s6"><?php echo $data['inscription_date']; ?></div>
        </div>
    </div>

</div>
