<div class="row"></div>

<div class="row">

    <div class="col l6 offset-l3 m12">
        <ul class="tabs tabs-fixed-width">
            <li class="tab col s3"><a href="#connexion">Se connecter</a></li>
            <li class="tab col s3"><a href="#inscription">S'inscrire</a></li>
        </ul>
    </div>

    <div id="connexion" class="col l6 offset-l3 m12 active">
        <form action="<?php echo ROOTURL; ?>/connexion/" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" name="pass" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <p class=error><?php $_COOKIE["error"]; ?></p>
            <div class="row">
                <div class="col s12">
                    <input type="submit" class="btn waves-effect waves-light" value="Se connecter">
                </div>
            </div>
        </form>
    </div>

    <div id="inscription" class="col l6 offset-l3 m12">
        <form action="" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <input type="submit" class="btn waves-effect waves-light" value="S'inscrire">
                </div>
            </div>
        </form>
    </div>

</div>

