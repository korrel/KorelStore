<?php

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Tshirt;

Class TshirtService {

    // Je crée une propriété qui va contenir une valeur de l'objectManager dès l'instensiation de la Class
    // Cela afin de remplacer GETDOCTRINE dans mes autres functions, nécessaire dans les services !!
    private $om;
    public function __construct( ObjectManager $om){
        $this->om = $om;
    }

    // Un function qui renvoie TOUS les éléments
    public function getAll()
    {
        $repo = $this->om->getRepository(Tshirt::Class);
        return $repo->findAll();
    }

    // Un function qui renvoie UN élément par ID
    public function getTshirt( $id )
    {
        // foreach($this->tshirts as $key=>$value){ // je boucle sur LE TABLEAU en ciblant les clés et leurs valeurs
        //     if( $value['id'] == $id ){ // si la valeur de l'id = $id 
        //         return $value; // alors je retourne la valeur COMPLETE
        //     }
        // }
        // return null; // sinon return null

        $repo = $this->om->getRepository(Tshirt::Class);
        return $repo->find( $id );
    }
}

?>