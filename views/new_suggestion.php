<div class="row" id="jsop">
    <div class="col s12">
        <div class="card hoverable">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header" style="text-align: center;"><i class="material-icons">note_add</i>Suggérer une activité</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <form class="col s12" method="post" id="new_suggestion">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="activity_name" type="text" class="validate" name="activity_name" autocomplete="off">
                                        <label for="activity_name">Nom</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="activity_description" class="materialize-textarea" name="activity_description"></textarea>
                                        <label for="activity_description">Description</label>
                                    </div>
                                </div>
                                    <button class="btn waves-effect waves-light" type="submit" name="action" style="width: 100%;">Envoyer
                                        <i class="material-icons right">send</i>
                                    </button>
                                    <?php
                                    echo $data['info_msg'];
                                    ?>
                            </form>
                        </div>
                    </div>                                
                </li>
            </ul>
        </div>
    </div>
</div>