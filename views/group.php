<?php

var_dump($data['groups']);

?>

<div class="row">
    <?php foreach($data['groups'] as $k => $v) { ?>
        <div class="col s4">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $v['id']; ?>">
            <div class="row">
                <?php echo $v['name']; ?>
                <select name="perm[]" multiple>
                    <?php foreach($data['permissions'] as $kk => $vv) { ?>
                        <option value="<?php echo $vv; ?>" <?php echo (BitField::has($v['permissions'], $vv)) ? 'selected' : ''; ?>>
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
    <?php } ?>
</div>
