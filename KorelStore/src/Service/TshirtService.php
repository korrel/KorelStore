<?php

namespace App\Service;

Class TshirtService {

    private $tshirts = [
        [
            'id' => 1,
            'couleur' => 'bleu',
            'taille' => 'xl',
            'motif' => 'Azeroth'
        ],
        [
            'id' => 2,
            'couleur' => 'rouge',
            'taille' => 'm',
            'motif' => 'Dalaran'
        ],
        [
            'id' => 3,
            'couleur' => 'vert',
            'taille' => 's',
            'motif' => 'Hurlevent'
        ]
    ];

    // Un function qui renvoie TOUS les éléments
    public function getAll()
    {
        return $this->tshirts;  // je cible une propriété Private = mon tableau entier
    }

    // Un function qui renvoie UN élément par ID
    public function getTshirt( $id )
    {
        foreach($this->tshirts as $key=>$value){ // je boucle sur LE TABLEAU en ciblant les clés et leurs valeurs
            if( $value['id'] == $id ){ // si la valeur de l'id = $id 
                return $value; // alors je retourne la valeur COMPLETE
            }
        }
        return null; // sinon return null
    }
}

?>