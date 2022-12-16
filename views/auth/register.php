<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center mb-4">Inscription</h3>
            <form action="/register" method="POST">
                <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input type="text" class="form-control" id="firstName" name="prenom" placeholder="Entrez votre prénom">
                </div>
                <div class="form-group">
                    <label for="lastName">Nom</label>
                    <input type="text" class="form-control" id="lastName" name="nom" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                <p>Déjà inscrit ? <a href="/login">Connexion</a></p>
            </form>
        </div>
    </div>
</div>
