
<div class="row">
    
    <div class="col s6">
        <?php foreach($data['groups'] as $k => $v) { ?>
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><?php echo $v['name']; ?></span>
                    <form method="post" action="<?php echo ROOTURL.'/groupe/modify/'.$v['id'].'/'; ?>">
                        <select name="perm[]" multiple>
                            <?php foreach($data['permissions'] as $kk => $vv) { ?>
                                <option value="<?php echo $vv; ?>"
                                        <?php echo (BitField::has($v['permissions'], $vv)) ? 'selected' : ''; ?>>
                                    <?php echo $kk; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <input type="submit" class="btn" value="Modifier">
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
    
    <div class="col s6">
        
    </div>
    
</div>


