<?php

class Panier {
    public $nbProduit; //propriété (variable)
    public function ajouterProduit(){
        //traitement de la méthode
        return 'L\'article a bien été ajouté au parnier !';
    }
    protected function retirerProduit(){
        return 'L\'article a été retiré du panier !';
    }
    private function affichagePanier(){
        return 'Voici les produits dans le panier !';
    }
}
//---------------------------------------
$panier = new Panier; //Instanciation $panier représente un objet de la classe Panier
var_dump($panier);
var_dump(get_class_methods($panier));

$panier -> nbProduit = 5;
echo 'Nombre de produit : ' . $panier -> nbProduit . '<br>';
echo '<pre>';
var_dump($panier);
echo '</pre>';

echo 'Panier : ' . $panier->ajouterProduit() . '<br>';
// echo 'Panier : ' . $panier->retirerProduit() . '<br>'; //ERREUR : Impossible d'accéder à un élément protected à l'extérieur de la classe.
// echo 'Panier : ' . $panier->affichagePanier() . '<br>'; //ERREUR : Impossible d'accéder à un élément private à l'extérieur de la classe.

$panier2 = new Panier;
echo '<pre>';
var_dump($panier2);
echo '</pre>';

/*
    Commentaires :
        New : est un mot clé qui permet de créer un objet issu d'une classe (instanciation)
        On peut créer plusieurs objets d'une même classe. Et lorsqu'on affecte une valeur à une propriété d'un objet cela n'a pas d'incidence sur les autres objets de la classe.

        Niveau de visibilité : 
            -public : Accesible de partout ! 
            - protected : Accesible depuis la classe où l'élément à été déclaré ainsi que depuis les classes héritières.
            -private : Accesible UNIQUEMENT depuis la classe où l'élément à été délcaré.
*/