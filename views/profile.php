
<div class="row"></div>
<div class="row">
    <div class="col s6 offset-s3">
        <h1>PROFIL</h1>
        <div class="divider"></div>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s3">
        <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input type="text" id="username" readonly="readonly"
                   value="<?php echo $data['username']; ?>">
        </div>
        <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input type="text" id="groupe" readonly="readonly"
                   value="<?php echo $data['groupe']; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s3">
        <div class="input-field">
        <i class="material-icons prefix">account_circle</i>
        <input type="text" id="groupe" readonly="readonly"
               value="<?php echo $data['name']; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s3">
        <form>
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input id="email" type="email" name="email" class="validate"
                       value="<?php echo $data['email']; ?>" required>
                <label for="email">Email</label>
            </div>
            <div class="col s12">
                <input type="submit" class="btn waves-effect waves-light" value="Changer d'Email">
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s3">
        <?php if($data['avatar'] != null) { ?>
            <img alt="avatar" class="responsive-img materialboxed" src="<?php echo ROOTURL.BASEAVATAR.'/'.$data['avatar']; ?>">
        <?php } else { ?>
            Vous n'avez pas d'avatar.
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s3">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="file-field input-field s12">
                <div class="btn">
                    <span>Avatar</span>
                    <input type="file" accept="image/*" name="avatar" required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="col s12">
                <input type="submit" class="btn waves-effect waves-light"
                       value="Changer d'Avatar">
            </div>
        </form>
    </div>
</div>
