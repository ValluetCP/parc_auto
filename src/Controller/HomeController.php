<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    // '/home' : nom de la route, il peut être remplacé par ce que l'on veut. ce que l'on saisi dans l'url.Il doit être obligatoirement UNIQUE
    // 'name' : le nom de la route que l'on indique dans view (template) dans un lien {{ path('app_home') }}

    public function index(VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findAll();
        // dd($voitures);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'voitures' => $voitures
        ]);
    }

    #[Route('/car/{id}', name: 'app_car')]

    public function car(VoitureRepository $voitureRepository, $id): Response
    {   
        $voiture = $voitureRepository->find($id);
        return $this->render('home/show_voit.html.twig', [
            'voiture' => $voiture,
        ]);
    }
}
