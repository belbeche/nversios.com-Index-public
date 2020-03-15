<?php

namespace App\Controller;

use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * Page d'accueil du port Folio
     * @Route("/", name="index")
     */
    public function index(BlogRepository $repo)
    {
        // Je récupère les 4 dernières annonces depuis le BlogRepository
        $blog = $repo->findLatest();

        return $this->render('index/index.html.twig',[
            'current_menu' => 'home',
            'annonces' => $blog,
        ]);
    }
}
