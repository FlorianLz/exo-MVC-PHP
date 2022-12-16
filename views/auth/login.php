<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center mb-4">Connexion</h3>
            <form action="/login" method="POST">
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                <p>Pas encore inscrit ? <a href="/register">Inscription</a></p>
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
