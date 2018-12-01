<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TshirtController extends AbstractController
{
    /**
     * @Route("/tshirt-homme", name="tshirt_listHomme")
     */
    public function listHomme()
    {
        return $this->render('tshirt/index.html.twig', [
            'controller_name' => 'T-shirt pour Homme',
        ]);
    }

    /**
     * @Route("/tshirt-femme", name="tshirt_listFemme")
     */
    public function listFemme()
    {
        return $this->render('tshirt/index.html.twig', [
            'controller_name' => 'T-shirt pour Femme',
        ]);
    }

    /**
     * @Route("/tshirt-homme/{id}", name="tshirt_showHomme", requirements={"id"="\d+"})
     */
    public function showHomme( $id )
    {
        return $this->render('tshirt/index.html.twig', [
            'controller_name' => 'Détail d\'un T-shirt Homme',
        ]);
    }

    /**
     * @Route("/tshirt-femme/{id}", name="tshirt_showFemme", requirements={"id"="\d+"})
     */
    public function showFemme( $id )
    {
        return $this->render('tshirt/index.html.twig', [
            'controller_name' => 'Détail d\'un T-shirt Femme',
        ]);
    }

    /**
     * @Route("/new-tshirt", name="tshirt_add")
     */
    public function add( )
    {
        return $this->render('tshirt/index.html.twig', [
            'controller_name' => 'Ajouter un Nouveau T-shirt',
        ]);
    }
}
