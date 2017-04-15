
<!DOCTYPE html>
<html>
    <head>
        <title>BDE</title>
        <meta charset="utf-8">
        <link href="<?php echo ROOTURL; ?>/materialize/MaterialIcons.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo ROOTURL; ?>/materialize/css/materialize.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ROOTURL; ?>/css/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="<?php echo ROOTURL; ?>/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo ROOTURL; ?>/favicon.ico" type="image/x-icon">
    </head>

    <body>

        <nav>
            <div class="nav-wrapper">
                <?php if($data["session"]->has_data()) { ?>
                    <a href="#!" data-activates="slide-out" class="button-collapse" style="display: block !important;">
                        <i class="material-icons">menu</i>
                    </a>
                <?php } ?>
                <a href="<?php echo ROOTURL; ?>">
                    <img alt="logo" src="<?php echo ROOTURL; ?>/logo.png" style="height:60px;">
                </a>
                <a href="<?php echo ROOTURL; ?>" class="brand-logo">BDE</a>
                <ul id="nav-mobile" class="right">
                    <?php if(!$data["session"]->has_data()) { ?>
                        <li>
                            <a href="<?php echo ROOTURL; ?>/inscription/">S'inscrire</a>
                        </li>
                        <li>
                            <a href="<?php echo ROOTURL; ?>/connexion/">Se connecter</a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="<?php echo ROOTURL; ?>/deconnexion/">Se deconnecter</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        
        <?php if($data["session"]->has_data()) { ?>
            <ul id="slide-out" class="side-nav">
                <li>
                    <div class="userView">
                        <div class="background">
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <a href="#!user">
                                    <img class="responsive-img materialboxed" src="<?php echo ROOTURL.BASEAVATAR.'/'.((!empty($data['avatar'])) ? $data['avatar'] : DEFAULT_USER_AVATAR); ?>">
                                </a>
                            </div>

                            <div class="col s6">
                                <a href="#!name">
                                    <span class="white-text name"><?php echo $data['session']->username; ?></span>
                                </a>
                                <a href="#!email">
                                    <span class="white-text email"><?php echo $data['session']->email; ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="row"></div>
                    </div>
                </li>
                <li><a class="waves-effect" href="<?php echo ROOTURL; ?>/profile/"><i class="material-icons">cloud</i>Profile</a></li>
                <li><div class="divider"></div></li>
                <li><a class="waves-effect" href="<?php echo ROOTURL; ?>/activities/">Activitées</a></li>
                <li><a class="waves-effect" href="<?php echo ROOTURL; ?>/photos/">Photos</a></li>
            </ul>
        <?php } ?>
        
        
        <div class="container main">

            
