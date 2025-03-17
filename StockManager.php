<?php

namespace Shinv\TestUnitaire;

class ProduitExistantException extends \Exception {}
class ProduitInexistantException extends \Exception {}
class QuantiteInvalideException extends \Exception {}

class StockManager {
    /**
     * Le tableau qui va contenir l'ensemble des produits stocker
     * @var array
     */
    private $produits = [];

    /**
     * Ajoute un produit au stock.
     *
     * @param array $produit
     * @throws ProduitExistantException
     */
    public function ajouterProduit(array $produit): void {
        foreach ($this->produits as $p) {
            if ($p['id'] === $produit['id']) {
                throw new ProduitExistantException("Le produit avec l'ID {$produit['id']} existe déjà.");
            }
        }
        if (empty($produit['quantité']) || $produit['quantité'] < 0) {
            throw new QuantiteInvalideException("La quantité ne peut pas être négative ou nulle.");
        }
        $this->produits[] = $produit;
    }

    /**
     * Supprime un produit du stock.
     *
     * @param int $id
     * @throws ProduitInexistantException
     */
    public function supprimerProduit(int $id): void {
        foreach ($this->produits as $index => $produit) {
            if ($produit['id'] === $id) {
                unset($this->produits[$index]);
                $this->produits = array_values($this->produits); // Réindexation
                return;
            }
        }
        throw new ProduitInexistantException("Le produit avec l'ID $id n'existe pas.");
    }

    /**
     * Modifie la quantité d'un produit.
     *
     * @param int $id
     * @param int $quantite
     * @throws ProduitInexistantException
     * @throws QuantiteInvalideException
     */
    public function modifierQuantite(int $id, int $quantite): void {
        foreach ($this->produits as &$produit) {
            if ($produit['id'] === $id) {
                if ($produit['quantité'] + $quantite < 0) {
                    throw new QuantiteInvalideException("La quantité ne peut pas être négative.");
                }
                $produit['quantité'] += $quantite;
                return;
            }
        }
        throw new ProduitInexistantException("Le produit avec l'ID $id n'existe pas.");
    }

    /**
     * Liste les produits par catégorie.
     *
     * @param string $categorie
     * @return array
     */
    public function listerProduitsParCategorie(string $categorie): array {
        return array_filter($this->produits, fn($produit) => $produit['catégorie'] === $categorie);
    }

    /**
     * Méthode qui permet de retourner l'ensemble des produits
     * @return array
     */
    public function getProduits()
    {
        return $this->produits;
    }
}