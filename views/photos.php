<div class="row">
    <form action="" enctype="multipart/form-data"  method="post">
        <div class="input-field col s2">
            <select name="activity">
                <?php foreach($data['activities'] as $k => $v) { ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="file-field input-field col s8">
            <div class="btn">
                <span>File</span>
                <input type="file" accept="image/*" name="photo">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="input-field col s2">
            <input class="btn" type="submit" value="Upload">
        </div>
    </form>
</div>
<div class="row">
    <?php
    foreach($data['photos'] as $k => $v) {
        if($k % 3 == 0) {
    ?>
</div>
<div class="row">
    <?php             
    }
    ?>
    <div class="col s4">
        <div class="card hoverable">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL."/images/".$v["picture"]; ?>">
            </div>
            <!-- <div class="card-content">
                 <?php var_dump($v); ?>
                 </div> -->
            <div class="card-action">
                <a href="#">Aimer(0)</a>
                <?php if($data['can_delete']) { ?>
                    <a href="<?php echo ROOTURL."/photos/delete/".$v["id"].'/'; ?>">Suprimer</a>
                <?php } ?>
                <a href="<?php echo ROOTURL."/images/".$v["picture"]; ?>"
                   download="<?php echo $v["picture"]; ?>">Télécharger</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
