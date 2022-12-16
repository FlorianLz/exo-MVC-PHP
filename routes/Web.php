<?php

namespace routes;

use controllers\AuthController;
use controllers\ClientController;
use controllers\FicheController;
use controllers\ProduitController;
use controllers\SampleWebController;
use controllers\TodoWeb;
use routes\base\Route;
use utils\SessionHelpers;
use utils\Template;

class Web
{
    function __construct()
    {
        $main = new SampleWebController();
        $todo = new TodoWeb();
        $authController = new AuthController();
        $clientController = new ClientController();
        $ficheController = new FicheController();
        $produitController = new ProduitController();




        // Appel la fonction inline dans le routeur.
        // Utile pour du code très simple, où un tes, l'utilisation d'un contrôleur est préférable.

        //Exemple de limitation d'accès à une page en fonction de la SESSION.
                if (SessionHelpers::isLogin()) {
                    Route::Add('/logout', [$authController, 'logout']);
                    Route::Add('/about', [$main, 'about']);
                    Route::Add('/', [$todo, 'liste']);
                    Route::Add('/liste', [$todo, 'liste']);
                    Route::Add('/ajouter', [$todo, 'ajouter']);
                    Route::Add('/terminer', [$todo, 'terminer']);
                    Route::Add('/supprimer', [$todo, 'supprimer']);
                    Route::Add('/clients', [$clientController, 'liste']);
                    Route::Add('/client/supprimer/{id}', [$clientController, 'delete']);
                    Route::Add('/client/addProduct/{idClient}/{idProduit}', [$clientController, 'addProduct']);
                    Route::Add('/client/addProduct/{idClient}', [$clientController, 'addProduct']);
                    Route::Add('/client/{id}', [$ficheController, 'fiche']);
                    Route::Add('/produits', [$produitController, 'liste']);
                    Route::Add('/produit/supprimer/{id}', [$produitController, 'delete']);
                    Route::Add('/produit/{id}', [$produitController, 'fiche']);

                } else {
                    Route::Add('/', function () {
                        header('Location: /login');
                    });
                    Route::Add('/login', [$authController, 'login']);
                    Route::Add('/register', [$authController, 'register']);
                }

    }
}

