<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    // '/home' : nom de la route, il peut être remplacé par ce que l'on veut. ce que l'on saisi dans l'url.Il doit être obligatoirement UNIQUE
    // 'name' : le nom de la route que l'on indique dans view (template) dans un lien {{ path('app_home') }}

    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/cat', name: 'app_cat')]

    public function cat(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
