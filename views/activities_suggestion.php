<?php

var_dump($data['dump']);

?>

<div class="row">
    <div class="col s12">
        <div class="card hoverable">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Votez pour les prochaines activités !</span>
                    <table>
                        <thead>
                            <tr>
                                <th><i class="material-icons">list</i>Activité</th>
                                <th><i class="material-icons" style="margin-left: 25px;">alarm</i>Description</th>
                                <th><i class="material-icons">done</i>Vote</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        foreach ($data['activity_suggestion'] as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['name']; ?></td>
                                <td>
                                    <div class="col s12">
                                        <ul class="collapsible" style="width: 50vw; margin-left: 25px;" data-collapsible="accordion">
                                            <li>
                                                <div class="collapsible-header">En savoir plus</div>
                                                <div class="collapsible-body">
                                                    <span><?php echo $value['description']; ?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td><i class="material-icons">thumb_up</i></td>
                        <?php
                        }
                        ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>