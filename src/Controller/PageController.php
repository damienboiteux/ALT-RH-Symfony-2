<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/contact', name: 'app_page_contact')]
    public function index(): Response
    {
        $formulaire = $this->createForm(ContactType::class);
        return $this->render('page/contact.html.twig', [
            'formulaire' => $formulaire->createView()
        ]);
    }
}
