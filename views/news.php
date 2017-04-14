<?php
    if (strlen($data[0]['description']) > 500){
        $article_1 = substr($data[0]['description'], 0, 500) . ('...');
    }
    else{
        $article_1 = $data[0]['description'];
    }

    if (strlen($data[1]['description']) > 500){
        $article_2 = substr($data[1]['description'], 0, 500) . ('...');
    }
    else{
        $article_2 = $data[1]['description'];
    }

    if (!empty($data[0]['picture'])){
        $picture_1 = $data[0]['picture'];
    }
    else{
        $picture_1 = ROOTURL."/logo.png";
    }

    if (!empty($data[1]['picture'])){
        $picture_2 = $data[1]['picture'];
    }
    else{
        $picture_2 = ROOTURL."/logo.png";
    }
?>

<div class="row">
        <div class="col l6 m12">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="<?php echo $picture_1; ?>">
                    <span class="card-title"><?php echo $data[0]['name'] ; ?></span>
                </div>
                <div class="card-content">
                    <p><?php echo $article_1; ?></p>
                </div>
                <div class="card-action">
                    <a href="#">Voir l'activité correspondante</a>
                </div>
            </div>
        </div>

        <div class="col l6 m12">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="<?php echo $picture_2; ?>">
                    <span class="card-title"><?php echo $data[1]['name'] ; ?></span>
                </div>
                <div class="card-content">
                    <p><?php echo $article_2; ?></p>
                </div>
                <div class="card-action">
                    <a href="#">Voir l'activité correspondante</a>
                </div>
            </div>
        </div>
</div>
