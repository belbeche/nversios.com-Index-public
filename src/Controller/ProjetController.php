<?php

namespace App\Controller;

use App\Repository\BlogRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjetController extends AbstractController
{
    /**
     * Page principal des annonces
     * @Route("/annonces", name="annonces.index")
     * @param BlogRepository $repo
     */
    public function indexAll(BlogRepository $repo)
    {
        // je retourne toutes les annonces dans la page pricipal
        $repo->findAll();

        return $this->render('projet/index.html.twig');
    }

    /**
     * Page d'affichage par identification
     * @Route("/projet/{slug} - {id}", name="annonce.show", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function index(BlogRepository $repo, string $slug, $id): Response
    {
        // je récupère l'annonce par id et via la redirection path (annonce.show)
        $annonce = $repo->find($id);
        dump($repo);

        if ($annonce->getSlug() !== $slug){
            return $this->redirectToRoute('annonce.show',[
                'id' => $annonce->getId(),
                'slug' => $annonce->getSlug(),
            ], 301);
        }

        // je récupère mes annonces individuellement 

        return $this->render('projet/show.html.twig', [
            'current_menu' => 'Projet',
            'annonce' => $annonce
        ]);
    }
}
