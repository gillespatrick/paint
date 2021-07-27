<?php

namespace App\Controller;

use App\Entity\Paint;
use App\Repository\PaintRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductionController extends AbstractController
{
    /**
     * @Route("/Achievements", name="production")
     */
    public function index(PaintRepository $paintRepository,PaginatorInterface $paginator,Request $request): Response
    {
        // Add pagination
        $data = $paintRepository -> findAll();
        $paints = $paginator -> paginate(
            $data,
            $request -> query -> getInt('page',1),
            6
        );
        return $this->render('production/production.html.twig', [
            'paints' => $paints,
        ]);
    }


    /**
     * @Route ("/Achievement/{slug}", name = "detail_achiev")
     */

    public function details(Paint $paint): Response
    {
      
        return $this->render('production/details.html.twig', [
            'paint' => $paint,
        ]);
    }




}
