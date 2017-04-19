<div class="row">
    <div class="col s12">
        <div class="card hoverable">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Activité(s) à venir</span>
                    <table>
                        <thead>
                            <tr>
                                <th><i class="material-icons">list</i>Activité</th>
                                <th><i class="material-icons">alarm</i>Date</th>
                                <th><i class="material-icons">done</i>S'inscrire</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        foreach ($data['activity'] as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['date'] ?></td>
                                <td><a href="#" class="btn"><i class="material-icons">send</i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                        <div class="card-action">
                            <a href="<?php echo ROOTURL."/activities/"; ?>">Voir toutes les activités</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>