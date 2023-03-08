<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServiceController extends AbstractController
{
    #[Route('/services', name: 'app_service_index', methods: ['GET'])]
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('service/index.html.twig', [
            'services'  =>  $serviceRepository->findAll(),
        ]);
    }

    #[Route('/services/new', name: 'app_service_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ServiceRepository $serviceRepository): Response
    {
        $service = new Service();
        $formulaire = $this->createForm(ServiceType::class, $service);
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $serviceRepository->save($service, true);
            return $this->redirectToRoute('app_service_index');
        }

        return $this->render('service/new.html.twig', [
            'formulaire' => $formulaire->createView(),
        ]);
    }

    #[Route('/services/{id}', name: 'app_service_show', methods: ['GET'])]
    public function show(Service $service): Response
    {
        return $this->render('service/show.html.twig', [
            'service' => $service,
        ]);
    }

    #[Route('/services/{id}/edit', name: 'app_service_edit', methods: ['GET', 'POST'])]
    public function edit(Service $service, Request $request, ServiceRepository $serviceRepository): Response
    {

        $formulaire = $this->createForm(ServiceType::class, $service);
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $serviceRepository->save($service, true);
            return $this->redirectToRoute('app_service_index');
        }

        return $this->render('service/new.html.twig', [
            'formulaire' => $formulaire->createView(),
        ]);
    }

    #[Route('/services/{id}/delete', name: 'app_service_delete', methods: ['GET'])]
    public function delete(ServiceRepository $serviceRepository, Service $service): Response
    {
        $serviceRepository->remove($service, true);
        return $this->redirectToRoute('app_service_index');
    }
}
