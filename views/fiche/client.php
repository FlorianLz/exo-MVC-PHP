<div class="container mt-4">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Client / <?= $infos->getNom(). ' '. $infos->getPrenom() ?> / Informations</h5>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Données générales</h5>
            <form>
                <div class="row">
                    <div class="form-group col-5">
                        <label for="disabledName">Nom</label>
                        <input type="text" id="disabledName" class="form-control" placeholder="Nom" value="<?= $infos->getNom() ?>"disabled>
                    </div>
                    <div class="form-group col-5">
                        <label for="disabledFirstname">Prénom</label>
                        <input type="text" id="disabledFirstname" class="form-control" placeholder="Prénom" value="<?= $infos->getPrenom() ?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-5">
                        <label for="disabledPhone">Téléphone</label>
                        <input type="text" id="disabledPhone" class="form-control" placeholder="Téléphone" value="<?= $infos->getTelephone() ?>" disabled>
                    </div>
                    <div class="form-group col-5">
                        <label for="disabledEmail">Email</label>
                        <input type="email" id="disabledEmail" class="form-control" placeholder="Email" value="<?= $infos->getEmail() ?>" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Les produits</h5>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col"><a class="btn btn-success" href="/client/addProduct/<?= $infos->getId() ?>">Commander</a></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($infos->lesProduits() as $leProduit){ ?>
                    <tr>
                        <th scope="row"><?= $leProduit->getId() ?></th>
                        <td><?= $leProduit->getNom() ?></td>
                        <td><?= $leProduit->getDescription() ?></td>
                        <td><?= $leProduit->getPrix() ?>€</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Les adresses</h5>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Rue</th>
                        <th scope="col">Code Postal</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Ajouter</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($infos->lesAdresses() as $adresse){ ?>
                        <tr>
                            <th scope="row"><?= $adresse->getNom() ?></th>
                            <td><?= $adresse->getRue() ?></td>
                            <td><?= $adresse->getCodePostal() ?></td>
                            <td><?= $adresse->getVille() ?>€</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

</div>