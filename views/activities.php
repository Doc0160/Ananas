
<div class="row">
    <?php
    foreach($data['activities'] as $k => $v) {
    ?>
        <div class="col s6">
            <div class="card">
                <div class="card-image">
                    <img src="images/sample-1.jpg">
                    <span class="card-title"><?php echo $v['name']; ?></span>
                </div>
                <div class="card-content">
                    <?php echo $v['description']; ?>
                </div>
                <div class="card-action">
                    <a href="#">Joindre</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
