<?php
namespace models;

use models\base\SQL;
use utils\SessionHelpers;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }

    function marquerCommeTermine($id){
        $stmt = $this->getPdo()->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function ajouterTodo(mixed $texte)
    {
        $stmt = $this->getPdo()->prepare("INSERT INTO todos (texte,user_id) VALUES (?,?)");
        $stmt->execute([$texte, SessionHelpers::getConnected()['id']]);
    }

    public function supprimerTodo(mixed $id)
    {
        $stmt = $this->getPdo()->prepare("DELETE FROM todos WHERE id = ? AND termine = 1");
        $stmt->execute([$id]);
    }

    public function getAllTermine(): array|null
    {
        $stmt = $this->getPdo()->prepare("SELECT * FROM todos JOIN users ON users.id = todos.user_id WHERE termine = 0 ORDER BY users.id");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

}