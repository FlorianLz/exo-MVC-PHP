<?php
namespace controllers;

use controllers\base\WebController;
use models\ClientsModele;
use models\ProduitsModele;
use utils\Template;

class ClientController extends WebController
{
    private ClientsModele $clientModel;
    private ProduitsModele $produitsModele;

    function __construct(){
        $this->clientModel = new ClientsModele();
        $this->produitsModele = new ProduitsModele();
    }

    public function liste($page = 0, $search = null): string
    {
        if($search != null){
            $clients = $this->clientModel->recherche($search,10,$page);
        }else{
            $clients = $this->clientModel->liste(10, $page);
        }
        return Template::render(
            "views/liste/listeClients.php",
            array("page" => $page, "clients" => $clients, "search" => $search)
        );
    }

    public function addProduct($idClient, $idProduit = 0): string
    {
        if(isset($_POST['idProduit'])){
            $idProduit = $_POST['idProduit'];
        }

        if($idProduit != 0 && $idClient != 0){
            $this->produitsModele->affecterProduit($idClient, $idProduit);
            header("Location: /client/$idClient");
        }
        $listeProduits = $this->produitsModele->getAllProducts();
        return Template::render('views/client/addProduct.php', array("idClient" => $idClient, "listeProduits" => $listeProduits));
    }

    public function delete($id)
    {
        $this->clientModel->delete($id);
        header("Location: /clients");
    }
}