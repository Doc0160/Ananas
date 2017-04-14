<?php
    $article_1 = substr($data[0]['description'], 0, 500) . ('...');
    $article_2 = substr($data[1]['description'], 0, 500) . ('...');
?>

<div class="row">
        <div class="col l6 m12">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="http://materializecss.com/images/sample-1.jpg">
                    <span class="card-title"><?php echo $data[0]['name'] ; ?></span>
                </div>
                <div class="card-content">
                    <p><?php echo $article_1; ?></p>
                </div>
                <div class="card-action">
                    <a href="#">Voir l'article complet</a>
                </div>
            </div>
        </div>

        <div class="col l6 m12">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="http://materializecss.com/images/sample-1.jpg">
                    <span class="card-title"><?php echo $data[1]['name'] ; ?></span>
                </div>
                <div class="card-content">
                    <p><?php echo $article_2; ?></p>
                </div>
                <div class="card-action">
                    <a href="#">Voir l'article complet</a>
                </div>
            </div>
        </div>
</div>