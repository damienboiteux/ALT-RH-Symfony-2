<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeController extends AbstractController
{
    #[Route('/employes', name: 'app_employe_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('employe/index.html.twig', [
            'controller_name' => 'EmployeController',
        ]);
    }

    #[Route('/employes/new', name: 'app_employe_new', methods: ['GET', 'POST'])]
    public function new(): Response
    {
        return $this->render('employe/index.html.twig', [
            'controller_name' => 'EmployeController',
        ]);
    }

    #[Route('/employes/{id}', name: 'app_employe_show', methods: ['GET'])]
    public function show(): Response
    {
        return $this->render('employe/index.html.twig', [
            'controller_name' => 'EmployeController',
        ]);
    }

    #[Route('/employes/{id}/edit', name: 'app_employe_edit', methods: ['GET', 'POST'])]
    public function edit(): Response
    {
        return $this->render('employe/index.html.twig', [
            'controller_name' => 'EmployeController',
        ]);
    }

    #[Route('/employes/{id}/delete', name: 'app_employe_delete', methods: ['GET'])]
    public function delete(): Response
    {
        return $this->render('employe/index.html.twig', [
            'controller_name' => 'EmployeController',
        ]);
    }
}
