<?php

var_dump($data['groups']);

?>

<div class="row">
    <?php foreach($data['groups'] as $k => $v) { ?>
        <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <form method="post" action="<?php echo ROOTURL.'/groupe/modify/'.$v['id'].'/'; ?>">
                        <input type="hidden" name="id" value="<?php echo $v['id']; ?>">
                        <div class="row">
                            <?php echo $v['name']; ?>
                        </div>
                        <div class="row">
                            <select name="perm[]" multiple>
                                <?php foreach($data['permissions'] as $kk => $vv) { ?>
                                    <option value="<?php echo $vv; ?>"
                                            <?php echo (BitField::has($v['permissions'], $vv)) ? 'selected' : ''; ?>>
                                        <?php echo $kk; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <input type="submit" class="col s12 btn" value="Modifier">
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    <?php } ?>
</div>
