<?php
namespace controllers;

use controllers\base\WebController;
use models\ClientsModele;
use utils\Template;

class FicheController extends WebController
{
    private ClientsModele $clientModel;

    function __construct(){
        $this->clientModel = new ClientsModele();
    }

    public function fiche($id="")
    {
        // À compléter avec les bons appels de méthode.
        $infos = $this->clientModel->getByClientId($id);
        return Template::render("views/fiche/client.php", ["infos" => $infos]);
    }
}