<?php
namespace controllers;

use controllers\base\WebController;
use models\ProduitsModele;
use utils\Template;

class ProduitController extends WebController
{

    private ProduitsModele $produitsModele;

    function __construct(){
        $this->produitsModele = new ProduitsModele();
    }

    public function liste($page = 0, $search = null): string
    {
        if($search != null){
            $produits = $this->produitsModele->recherche($search,10,$page);
        }else{
            $produits = $this->produitsModele->liste(10, $page);
        }
        return Template::render(
            "views/liste/listeProduits.php",
            array("page" => $page, "produits" => $produits, "search" => $search)
        );
    }

    public function fiche($id="")
    {
        // À compléter avec les bons appels de méthode.
        $infos = $this->produitsModele->getByProduitId($id);
        return Template::render("views/fiche/produit.php", ["infos" => $infos]);
    }

    public function delete($id)
    {
        $this->produitsModele->delete($id);
        header("Location: /produits");
    }
}