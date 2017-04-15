<?php

var_dump($data['groups']);

?>

<div class="row">
    <?php foreach($data['groups'] as $k => $v) { ?>
        <div class="col s4 z-depth-1">
            <div class="row">
                <?php echo $v['name']; ?>
                <select multiple>
                    <?php foreach($data['permissions'] as $kk => $vv) { ?>
                        <option value="<?php echo $vv; ?>" <?php echo (BitField::has($v['permissions'], $vv)) ? 'selected' : ''; ?>>
                            <?php echo $kk; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
    <?php } ?>
</div>
