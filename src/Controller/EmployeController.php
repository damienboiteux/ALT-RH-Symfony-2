<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Request;
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
    public function new(Request $request, EmployeRepository $employeRepository): Response
    {
        $employe = new Employe();
        $formulaire = $this->createForm(EmployeType::class, $employe);
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $employeRepository->save($employe, true);
            return $this->redirectToRoute('app_employe_index');
        }

        return $this->render('employe/new.html.twig', [
            'formulaire' => $formulaire->createView(),
        ]);
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
    public function edit(Request $request, Employe $employe, EmployeRepository $employeRepository): Response
    {
        $formulaire = $this->createForm(EmployeType::class, $employe);
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $employeRepository->save($employe, true);
            return $this->redirectToRoute('app_employe_index');
        }

        return $this->render('employe/edit.html.twig', [
            'formulaire' => $formulaire->createView(),
        ]);
    }

    #[Route('/employes/{id}/delete', name: 'app_employe_delete', methods: ['GET'])]
    public function delete(EmployeRepository $employeRepository, Employe $employe): Response
    {
        $employeRepository->remove($employe, true);
        return $this->redirectToRoute('app_employe_index');
    }
}
