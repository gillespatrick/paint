<?php

namespace App\Controller;

use App\Repository\BlogpostRepository;
use App\Repository\PaintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PaintRepository $paintRepository,BlogpostRepository $blogpostRepository): Response
    {
      //  $paints = $paintRepository -> findBy([],['id' => 'DESC'], 3,0);
        return $this->render('home/home.html.twig', [
            'paints' => $paintRepository -> lastTree(),
            'blogposts' => $blogpostRepository -> lastTree()
        ]);
    }
}
