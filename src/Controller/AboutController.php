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
    public function index(UserRepository $userRepo): Response
    {

        // $paint = $userRepo -> find($firstname);
        $user = $userRepo->findAll();
        return $this->render('about/about.html.twig', [
            //'paint' => $userRepo->getPaint()
            'user' => $user

        ]);
    }
}
