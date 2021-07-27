<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/Contact", name="contact")
     */
    public function index(Request $request,EntityManagerInterface $manager): Response
    {

        $contact = new Contact();

        $form = $this -> createForm(ContactType::class,$contact);
        $form -> handleRequest($request);

        if ($form -> isSubmitted() && $form -> isValid()) {
            $contact -> setCreatedAt(new \DateTime());
            $contact -> setIsSend(false);
            
            $manager -> persist($contact);
            $manager -> flush();

            $this->addFlash(
                'notice',
                "Message envoye avec success"
            );

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form -> createView(),
        ]);
    }
}
