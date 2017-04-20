
<!DOCTYPE html>
<html>
    <head>
        <title>Site BDE</title>
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
                    <a href="#!" data-activates="slide-out"
                       class="button-collapse"
                       style="display: block !important;">
                        <i class="material-icons">menu</i>
                    </a>
                    <a href="#!" data-activates="slide-out"
                       class="button-collapse btn-floating red"
                       style="display: block !important; position: fixed; z-index: -1;">
                        <i class="material-icons">menu</i>
                    </a>
                <?php } ?>
                <a href="<?php echo ROOTURL; ?>">
                    <img alt="logo" src="<?php echo ROOTURL; ?>/logo.png" style="height:60px;">
                </a>
                <a id="main_title" href="<?php echo ROOTURL; ?>" class="brand-logo">Site Web du BDE</a>
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
                                <img class="responsive-img materialboxed"
                                     src="<?php 
                                          echo ROOTURL.BASEAVATAR.'/'.
                                               ((!empty($data['avatar'])) ? $data['avatar'] : DEFAULT_USER_AVATAR); 
                                          ?>">
                            </div>

                            <div class="col s6">
                                <span class="white-text name">
                                    <?php echo $data['session']->username; ?>
                                </span>
                                <span class="white-text email">
                                    <?php echo $data['session']->email; ?>
                                </span>
                                <span class="white-text email">
                                    <?php echo $data['groupe']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="row"></div>
                    </div>
                </li>
                <li>
                    <a class="waves-effect" href="<?php echo ROOTURL; ?>/profile/">
                        <i class="material-icons">account_box</i>
                        Profile
                    </a>
                </li>
                <li><div class="divider"></div></li>
                <li>
                    <a class="waves-effect" href="<?php echo ROOTURL; ?>/activities/">
                        <i class="material-icons">today</i>
                        Activités
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="<?php echo ROOTURL; ?>/photos/">
                        <i class="material-icons">photo</i>
                        Photos
                    </a>
                </li>
                <li>
                    <a href="<?php echo ROOTURL; ?>/shop/">
                        <i class="material-icons">shopping_cart</i>
                        Shop
                    </a>
                </li>
                <li><div class="divider"></div></li>
                <?php if ($data['session']->has_data() &&
                          (BitField::has($data['session']->permissions,
                                        PERMISSION_CREATE_GROUPE) ||
                          BitField::has($data['session']->permissions,
                                        PERMISSION_MODIFY_GROUPE) ||
                          BitField::has($data['session']->permissions,
                                        PERMISSION_DELETE_GROUPE))) { ?>
                <li>
                    <a class="waves-effect" href="<?php echo ROOTURL; ?>/groupe/">
                        <i class="material-icons">group_add</i>
                        Groupes
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="<?php echo ROOTURL; ?>/groupe/">
                        <i class="material-icons">group_add</i>
                         Suggestions à approuver
                    </a>
                </li>
                <?php } ?>
            </ul>
        <?php } ?>
        <div class="container main">

            <div class="row"></div>
            
