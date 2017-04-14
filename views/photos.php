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
                <span class="card-title"><?php echo $v["activity"]; ?></span>
            </div>
            <div class="card-action">
                <a href="<?php echo ROOTURL."/photos/like/".$v["id"].'/'; ?>">
                    <i class="material-icons"><?php echo ($v['you_like']) ? 'thumb_down' : 'thumb_up';?></i>
                    (<?php echo $v["likes"]; ?>)
                </a>
                <?php if($data['can_delete']) { ?>
                    <a href="<?php echo ROOTURL."/photos/delete/".$v["id"].'/'; ?>">
                        <i class="material-icons">delete</i>
                    </a>
                <?php } ?>
                <a href="<?php echo ROOTURL."/images/".$v["picture"]; ?>"
                   download="<?php echo $v["picture"]; ?>">
                    <i class="material-icons">file_download</i>
                </a>
                <?php if(count($v['comments']) > 0) { ?>
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Comments</div>
                        <div class="collapsible-body collection">
                            <?php foreach($v['comments'] as $kk => $vv) { ?>
                                <div class="row collection-item">
                                    <div class="col s3">
                                        <?php echo $vv['username']; ?>
                                        <img alt="avatar" class="responsive-img" src="<?php echo BASEURI.BASEAVATAR.'/'.((false) ? $vv['avatar'] : 'logo.png'); ?>">
                                    </div>
                                    <div class="col s9">
                                        <p><?php echo $vv['comment']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
