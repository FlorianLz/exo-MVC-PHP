<div class="container mt-4">
    <!-- Barre de recherche -->
    <form class="row" method="GET">
        <input class=" mr-sm-2 col-10" type="search" name="search" placeholder="Rechercher" aria-label="Rechercher" value="<?= $search ?>">
        <button class="btn btn-outline-success my-2 my-sm-0 col-2" type="submit">Rechercher</button>
    </form>

    <!-- Card "Les clients" -->
    <div class="card mt-3 row">
        <div class="card-header">
            Les clients
        </div>
        <div class="card-body">
            <?php if(count($clients) > 0){ ?>
                <!-- Tableau de clients -->
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Email</th>
                        <th scope="col"><a class="btn btn-success">Créer un client</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Ligne du tableau pour chaque client -->
                    <?php foreach ($clients as $client){ ?>
                        <tr>
                            <th scope="row"><?= $client->getId() ?></th>
                            <td><?= $client->getNom() ?></td>
                            <td><?= $client->getTelephone() ?></td>
                            <td><?= $client->getEmail() ?></td>
                            <td>
                                <!-- Bouton "Voir plus d'infos" -->
                                <a href="/client/<?= $client->getId() ?>" type="button" class="btn btn-secondary"> > </a>
                                <a href="/client/supprimer/<?= $client->getId() ?>" type="button" class="btn btn-danger"> X </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">
                            <?php if($page > 0){ ?>
                                <?php if($search != null){ ?>
                                    <a class="btn btn-secondary" href="/clients?page=<?= $page - 1 ?>&search=<?= $search ?>"> < </a>
                                <?php }else{ ?>
                                    <a class="btn btn-secondary" href="/clients?page=<?= $page - 1 ?>"> < </a>
                                <?php } ?>
                            <?php } ?>

                            <?php if(count($clients) == 10) { ?>
                                <?php if($search != null){ ?>
                                    <a class="btn btn-secondary" href="/clients?page=<?= $page + 1 ?>&search=<?= $search ?>"> > </a>
                                <?php }else{ ?>
                                    <a class="btn btn-secondary" href="/clients?page=<?= $page + 1 ?>"> > </a>
                                <?php } ?>
                            <?php } ?>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                Aucun client trouvé.
            </div>
            <?php } ?>

        </div>