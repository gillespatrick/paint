<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @Route("/About", name="about")
     */
    public function index(): Response
    {
     
       // $paint = $userRepository -> find($firstname);
        return $this->render('about/about.html.twig', [
           // 'paint' => $userRepository -> getPaint(),
           
        ]);
    }
}
