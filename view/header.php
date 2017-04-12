
<!DOCTYPE html>
<html>
    <head>
        <title>Ananas Corp.</title>
        <meta charset="utf-8">
        <!--Import Google Icon Font-->
        <link href="http://localhost/ananas/materialize/MaterialIcons.css" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="http://localhost/ananas/materialize/css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="http://localhost/ananas/favicon.ico" type="image/x-icon">
        <link rel="icon" href="http://localhost/ananas/favicon.ico" type="image/x-icon">
        <style>
         body {
             display: flex;
             min-height: 100vh;
             flex-direction: column;
         }
         .main {
             flex: 1 0 auto;
         }

         nav, .page-footer, .waves-button-input input[type="submit"] {
             background: #c2242a;
         }
         
        </style>
    </head>

    <body>

        <nav>
            <div class="nav-wrapper">
                <?php if(!empty($_SESSION["username"])) { ?>
                    <a href="#" data-activates="slide-out" class="button-collapse" style="display: block !important;">
                        <i class="material-icons">menu</i>
                    </a>
                <?php } ?>
                <a href="#"><img src="http://localhost/ananas/logo.png" height="60px;"></a>
                <a href="#" class="brand-logo">Ananas</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <?php if(empty($_SESSION["username"])) { ?>
                        <li><a href="http://localhost/ananas/inscription/">S'inscrire</a></li>
                        <li><a href="http://localhost/ananas/connexion/">Se connecter</a></li>
                    <?php } else { ?>
                        <li><a href="http://localhost/ananas/deconnexion/">Se deconnecter</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        
        <?php if(!empty($_SESSION["username"])) { ?>
            <ul id="slide-out" class="side-nav">
                <li>
                    <div class="userView">
                        <div class="background">
                            <img src="http://materializecss.com/images/office.jpg">
                        </div>
                        <a href="#!user">
                            <img class="circle" src="http://materializecss.com/images/yuna.jpg">
                        </a>
                        <a href="#!name">
                            <span class="white-text name">John Doe</span>
                        </a>
                        <a href="#!email">
                            <span class="white-text email">jdandturk@gmail.com</span>
                        </a>
                    </div>
                </li>
                <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                <li><a href="#!">Second Link</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Subheader</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
        </ul>
        <?php } ?>
        
        
        <div class="container main">
