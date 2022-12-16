<?php
namespace controllers;

use controllers\base\WebController;
use models\TodoModel;
use utils\Template;

class TodoWeb extends WebController
{
    private $todoModel;

    function __construct(){
        $this->todoModel = new TodoModel();
    }

    function liste()
    {
        $todos = $this->todoModel->getAllTermine(); // Récupération des TODOS présents en base.
        return Template::render("views/todos/liste.php", array('todos' => $todos)); // Affichage de votre vue.
    }

    function ajouter($texte = "")
    {
        if($texte != ""){
            $this->todoModel->ajouterTodo($texte); // Ajout d'un TODO en base.
            $this->redirect("./liste");
        }

    }

    function terminer($id = ''){
        if($id != ""){
            $this->todoModel->marquerCommeTermine($id);
        }
        $this->redirect("./liste");
    }

    function supprimer($id = ''){
        if($id != ""){
            $this->todoModel->supprimerTodo($id);
        }
        $this->redirect("./liste");
    }
}