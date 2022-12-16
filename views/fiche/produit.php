<div class="container mt-4">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Produit / <?= $infos->getNom() ?> / Informations</h5>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Données générales du produit</h5>
            <form>
                <div class="row">
                    <div class="form-group col-5">
                        <label for="disabledName">Nom</label>
                        <input type="text" id="disabledName" class="form-control" placeholder="Nom" value="<?= $infos->getNom() ?>"disabled>
                    </div>
                </div>
                <div class="form-group col-12">
                    <label for="disabledPhone">Description</label>
                    <textarea type="text" id="disabledPhone" class="form-control" placeholder="Téléphone" value="" disabled><?= $infos->getDescription() ?></textarea>
                </div>
            </form>
        </div>
    </div>

</div>