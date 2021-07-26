<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Paint;
use App\Repository\CategoryRepository;
use App\Repository\PaintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{



    /**
     * @Route("/Portfolio", name="portfolio")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
      //  $categories = $categoryRepository->findAll();
        return $this->render('portfolio/portfolio.html.twig', [
            'categories' => $categoryRepository->findAll()
        ]);
    }

     /**
     * @Route("/Portfolio/{slug}", name="portfolio_category")
     */
    public function category(PaintRepository $paintRepository,Category $category): Response
    {
        
        $paints = $paintRepository -> findAllPortfolio($category);
      
        return $this->render('portfolio/category.html.twig', [
            'categories' => $category,
            'paints' => $paints
        ]);
    }   


     




}
