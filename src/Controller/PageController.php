<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    #[Route('/contact', name: 'app_page_contact')]
    public function index(Request $request): Response
    {
        $formulaire = $this->createForm(ContactType::class);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $data = $formulaire->getData();
            dump($data);
        }


        return $this->render('page/contact.html.twig', [
            'formulaire' => $formulaire->createView()
        ]);
    }
}
