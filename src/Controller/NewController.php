<?php

namespace App\Controller;

use App\Repository\BlogpostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


class NewController extends AbstractController
{
    /**
     * @Route("/News", name="new")
     */
    public function index(BlogpostRepository $blogpost, Request $request,PaginatorInterface $paginator): Response
    {

        // Add pagination
        $data = $blogpost-> findAll();
        $blogposts = $paginator -> paginate(
            $data,
            $request -> query -> getInt('page',1),
            6
        );
        return $this->render('new/new.html.twig', [
            'blogposts' => $blogposts,
        ]);
    }
}
