<?php

namespace models;

use models\base\SQL;
use models\classes\Client;
use models\classes\Produit;


class ProduitsModele extends SQL
{
    public function __construct()
    {
        parent::__construct('produit', 'id');
    }

    /**
     * Liste les produits d'un client donné
     * @param string $clientId
     * @return Produit[]
     */
    public function lesProduitsClient(string $clientId): array
    {
        $query = "SELECT produit.* FROM produit INNER JOIN commander ON commander.idProduit = produit.id INNER JOIN client ON client.id = commander.idClient WHERE idClient = ?";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$clientId]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Produit::class);
    }

    /**
     * Retourne la liste des clients ayant commandé le produit $produitId
     * @param string $produitId
     * @return Client[]
     */
    public function lesClientProduits(string $produitId): array{
        $query = "SELECT client.* FROM produit INNER JOIN commander ON commander.idProduit = produit.id INNER JOIN client ON client.id = commander.idClient WHERE idProduit = ?";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$produitId]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Client::class);
    }

    /**
     * Ajoute un nouveau produit en base. Si un $clientId est passé en paramètre alors le produit
     * est associé à ce client.
     * @param Produit $unProduit
     * @param int|null $clientId
     * @return bool|string
     */
    public function creerProduit(Produit $unProduit, int $clientId = null): bool|string
    {
        $query = "INSERT INTO produit(id, nom, description, prix) VALUE (null, ?, ?, ?)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$unProduit->getNom(), $unProduit->getDescription(), $unProduit->getPrix()]);

        $idProduit = $this->getPdo()->lastInsertId();

        if($clientId != null){
            $this->affecterProduit($idProduit, $clientId);
        }

        return $idProduit;
    }

    /**
     * Affecte un produit à un client.
     * @param int $idProduit
     * @param int $idClient
     * @return void
     */
    public function affecterProduit(int $idProduit, int $idClient){
        $query = "INSERT INTO commander(idProduit, idClient) VALUE (?, ?)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$idClient, $idProduit]);
    }

    public function getAllProducts(){
        $query = "SELECT * FROM produit";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Produit::class);
    }

    /**
     * Liste les clients présents en base de données
     * @param int $limit
     * @param int $page
     * @return Produit[]
     */
    public function liste(int $limit = PHP_INT_MAX, int $page = 0): array
    {
        $query = "SELECT * FROM produit LIMIT :limit,:offset;";

        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([":limit" => $limit * $page, ":offset" => $limit]);

        return $stmt->fetchAll(\PDO::FETCH_CLASS, Produit::class);
    }

    /**
     * Retourne une liste de client correspondant au critère de recherche
     * @param string $keyword
     * @param int $limit
     * @param int $page
     * @return Produit[]
     */
    public function recherche(string $keyword = "", int $limit = PHP_INT_MAX, int $page = 0): array
    {
        $query = "SELECT * FROM produit WHERE nom LIKE :nom OR description like :description LIMIT :limit,:offset;";

        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([
            ":nom" => "%$keyword%",
            ":description" => "%$keyword%",
            ":limit" => $limit * $page,
            ":offset" => $limit
        ]);

        return $stmt->fetchAll(\PDO::FETCH_CLASS, Produit::class);
    }

    public function getByProduitId($produitId): Produit{
        $query = "SELECT * FROM produit WHERE id = ?";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$produitId]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Produit::class);
        return $stmt->fetch();
    }

    public function delete(string $id): bool
    {
        return parent::deleteOne($id);
    }
}