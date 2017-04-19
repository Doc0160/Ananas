
<div class="row">

    <?php foreach($data['goodies'] as $k => $v) { ?>
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo (is_null($v['picture'])) ? ROOTURL.'/logo.png' : ROOTURL.'/products/'.$v['picture']; ?>">
            </div>
            <div class="card-content">
                <span class="title"> <h5><?php echo $v['name']; ?></h5></span>
                <p><?php echo $v['description']; ?></p>
            </div>
            <div class="card-action">
                <span class="price"><h3><?php echo $v['price']; ?>€</h3></span>
                <a href="#">commander</a>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL.'/products/'; ?>casquette.jpg">
            </div>
            <div class="card-content">
                <span class="title"> <h5>Casquette exia</h5></span>
                <p>ceci est un article de qualité</p>
            </div>
            <div class="card-action">
                <span class="price"><h3>10€</h3></span>
                <a href="#">commander</a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL.'/products/'; ?>gourde.jpg">
            </div>
            <div class="card-content">
                <span class="card-title"><h5>Gourde Exia</h5></span>
                <p>ceci est un article de qualité</p>
            </div>
            <div class="card-action">
                <span class="price"><h3>100€</h3></span>
                <a href="#">commander</a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL.'/products/'; ?>pull.jpg">
            </div>
            <div class="card-content">
                <span class="card-title"><h5>Pull Exia</h5></span>
                <p>ceci est un article de qualité</p>
            </div>
            <div class="card-action">
                <span class="price"><h3>1000€</h3></span>
                <a href="#">commander</a>
            </div>
        </div>
    </div>
    
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL.'/products/'; ?>sac.jpg">
            </div>
            <div class="card-content">
                <span class="card-title"><h5>Sac Exia</h5></span>
                <p>ceci est un article de qualité</p>
            </div>
            <div class="card-action">
                <span class="price"><h3>10€</h3></span>
                <a href="#">commander</a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL.'/products/'; ?>kebab.jpg">
            </div>
            <div class="card-content">
                <span class="card-title"><h5>Kebab Exia</h5></span>
                <p>ceci est un article de qualité</p>
            </div>
            <div class="card-action">
                <span class="price"><h3>5€</h3></span>
                <a href="#">commander</a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL.'/products/'; ?>siphano.jpg">
            </div>
            <div class="card-content">
                <span class="card-title"><h5>T-shirt siphano</h5></span>
                <p>ceci est un article de qualité</p>
            </div>
            <div class="card-action">
                <span class="price"><h3>1€ svp</h3></span>
                <a href="#">commander</a>                
            </div>
        </div>
    </div>
    
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed"  src="<?php echo ROOTURL.'/products/'; ?>exia.jpg">
            </div>
            <div class="card-content">
                <span class="card-title"><h5>Ton Année à l'Exia</h5></span>
                <p>ceci est un article </p>
            </div>
            <div class="card-action">
                <span class="price"><h3>5500€</h3></span>
                <a href="#">commander</a>                        
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL.'/products/'; ?>deco.jpg">
            </div>
            <div class="card-content">
                <span class="card-title"><h5>le trophée Exia</h5></span>
                <p>dimensions :<br> 10cm x 5.5cm</p>
            </div>
            <div class="card-action">
                <span class="price"><h3>25€</h3></span>
                <a href="#">commander</a>                        
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image">
                <img class="materialboxed" src="<?php echo ROOTURL.'/products/'; ?>stage.jpg">
            </div>
            <div class="card-content">
                <span class="card-title"><h5>stage en entreprise</h5></span>
                <p>ceci est un article de qualité</p>
            </div>
            <div class="card-action">
                <span class="price"><h4>non disponible</h4></span>
                <a href="#">commander</a>
            </div>
        </div>
    </div>

</div>

