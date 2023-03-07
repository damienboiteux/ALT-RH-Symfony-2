<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeController extends AbstractController
{
    #[Route('/employes', name: 'app_employe_index', methods: ['GET'])]
    public function index(EmployeRepository $employeRepository): Response
    {
        return $this->render('employe/index.html.twig', [
            'employes'  =>  $employeRepository->findAll(),
        ]);
    }

    #[Route('/employes/new', name: 'app_employe_new', methods: ['GET', 'POST'])]
    public function new(): Response
    {
        return $this->render('employe/new.html.twig', []);
    }

    #[Route('/employes/{id}', name: 'app_employe_show', methods: ['GET'])]
    public function show(Employe $employe): Response
    {
        // $employe->setNom(strtoupper($employe->getNom()));
        // $employe->setPrenom("**************");
        return $this->render('employe/show.html.twig', [
            'employe' => $employe,
        ]);
    }

    #[Route('/employes/{id}/edit', name: 'app_employe_edit', methods: ['GET', 'POST'])]
    public function edit(int $id): Response
    {
        return $this->render('employe/index.html.twig', [
            'controller_name' => 'EmployeController',
        ]);
    }

    #[Route('/employes/{id}/delete', name: 'app_employe_delete', methods: ['GET'])]
    public function delete(EmployeRepository $employeRepository, Employe $employe): Response
    {
        $employeRepository->remove($employe, true);
        return $this->redirectToRoute('app_employe_index');
    }
}
