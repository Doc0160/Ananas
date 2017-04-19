<div class="row"><h1>PHOTOS</h1><div class="divider"></div></div>
<?php if($data['session']->has_data() && BitField::has($data['session']->permissions, PERMISSION_CREATE_PHOTO)) { ?>
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
<?php } ?>
<div class="row">
    <?php
    foreach($data['photos'] as $k => $v) {
    ?>
    <div class="col s12 l4">
        <div class="card hoverable">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL."/images/".$v["picture"]; ?>">
                <span class="card-title"><?php echo $v["activity"]; ?></span>
            </div>
            <div class="card-action">
                
                <?php if($data['can_like']) { ?>
                    <a class="ajax <?php echo ($v['you_like']) ? 'dislike' : 'like';?>"
                       href="<?php echo ROOTURL."/photos/like/".$v["id"].'/'; ?>">
                    <i class="material-icons">
                        <?php echo ($v['you_like']) ? 'thumb_down' : 'thumb_up';?>
                    </i>
                    (<span><?php echo $v["likes"]; ?></span>)
                </a>
                <?php } ?>
                
                <?php if($data['can_delete']) { ?>
                    <a href="<?php echo ROOTURL."/photos/delete/".$v["id"].'/'; ?>">
                        <i class="material-icons">delete</i>
                    </a>
                <?php } ?>
                
                <a href="<?php echo ROOTURL."/images/".$v["picture"]; ?>"
                   download="<?php echo $v["picture"]; ?>">
                    <i class="material-icons">file_download</i>
                </a>
                
                <?php if($data['can_like']) { ?>
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons">filter_drama</i>
                            Comments (<?php echo count($v['comments']); ?>)
                        </div>
                        <div class="collapsible-body collection">
                            <?php foreach($v['comments'] as $kk => $vv) { ?>
                                <div class="row collection-item">
                                    <div class="col s3">
                                        <a href="<?php echo ROOTURL.'/profile/'.$vv['id'].'/'; ?>">
                                            <?php echo $vv['username']; ?>
                                            <img alt="avatar" class="responsive-img" src="<?php echo BASEURI.BASEAVATAR.'/'.((false) ? $vv['avatar'] : 'logo.png'); ?>">
                                        </a>
                                    </div>
                                    <div class="col s9">
                                        <p><?php echo $vv['comment']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row collection-item">
                                <form method="post" action="<?php echo BASEURI.'/photos/comment/'.$v['id'].'/'; ?>">
                                    <div class="input-field col s9">
                                        <textarea name="comment" id="textarea1" class="materialize-textarea"></textarea>
                                        <label for="textarea1">Textarea</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input type="submit" class="btn" value="GO">
                                    </div>
                                </form>
                            </div>
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
