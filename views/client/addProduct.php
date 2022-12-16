<div class="container mt-4">
    <form action="/client/addProduct/<?= $idClient ?>" method="POST">
        <select name="idProduit">
            <?php foreach($listeProduits as $produit){ ?>
                <option value="<?= $produit->getId() ?>"><?= $produit->getNom() ?></option>
            <?php } ?>
        </select>
        <input class="btn btn-success" type="submit" value="Commander"></input>
    </form>
</div>