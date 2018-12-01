<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TshirtService;

class TshirtController extends AbstractController
{
    /**
     * @Route("/tshirt-homme", name="tshirt_listHomme")
     */
    public function listHomme( TshirtService $tshirtService )
    {
        return $this->render('tshirt/listHomme.html.twig', [
            'controller_name' => 'T-shirt pour Homme',
            'tshirts' => $tshirtService->getAll(),
        ]);
    }

    /**
     * @Route("/tshirt-femme", name="tshirt_listFemme")
     */
    public function listFemme(  TshirtService $tshirtService)
    {
        return $this->render('tshirt/listFemme.html.twig', [
            'controller_name' => 'T-shirt pour Femme',
            'tshirts' => $tshirtService->getAll(),
        ]);
    }

    /**
     * @Route("/tshirt-homme/{id}", name="tshirt_showHomme", requirements={"id"="\d+"})
     */
    public function showHomme(  TshirtService $tshirtService, $id )
    {
        return $this->render('tshirt/showHomme.html.twig', [
            'controller_name' => 'Détail d\'un T-shirt Homme',
            'tshirt' => $tshirtService->getTshirt( $id ),
        ]);
    }

    /**
     * @Route("/tshirt-femme/{id}", name="tshirt_showFemme", requirements={"id"="\d+"})
     */
    public function showFemme(  TshirtService $tshirtService, $id )
    {
        return $this->render('tshirt/showFemme.html.twig', [
            'controller_name' => 'Détail d\'un T-shirt Femme',
            'tshirt' => $tshirtService->getTshirt( $id ),
        ]);
    }

    /**
     * @Route("/new-tshirt", name="tshirt_add")
     */
    public function add( )
    {
        return $this->render('tshirt/add.html.twig', [
            'controller_name' => 'Ajouter un Nouveau T-shirt',
        ]);
    }
}
