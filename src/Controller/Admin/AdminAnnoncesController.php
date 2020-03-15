<?php 
namespace App\Controller\Admin;

use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAnnoncesController extends AbstractController{

    
    /**
     * @param BlogRepository $repo
     */
    private $repo;

    public function __construct(BlogRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * index Admin panel
     *
     * @return void
     */
    public function index()
    {
       $annonces = $this->repo->findAll();
       return $this->render('Admin/Annonces/index.html.twig');
    }
}