<div class="row">
    <div class="col s12">
        <div class="card hoverable">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Vous avez le destin des prochaines activités, choississez bien !</span>
                    <table>
                        <thead>
                            <tr>
                                <th>Activité suggéré</th>
                                <th>Description</th>
                                <th>Accepter</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($data['validation'] as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['description']; ?></td>
                                    <td><a href="<?php echo ROOTURL.'/suggestion/trash/'.$value['id'].'/'; ?>"><i class="material-icons" style="color: green;">done</i></a></td>
                                    <td><a href="<?php echo ROOTURL.'/suggestion/accept/'.$value['id'].'/'; ?>"><i class="material-icons" style="color: red;">delete_forever</i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

