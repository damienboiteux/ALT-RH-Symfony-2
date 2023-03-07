<?php

namespace App\Controller;

use App\Entity\Service;
use App\Repository\ServiceRepository;
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
    public function new(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
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
    public function edit(int $id): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }

    #[Route('/services/{id}/delete', name: 'app_service_delete', methods: ['GET'])]
    public function delete(ServiceRepository $serviceRepository, Service $service): Response
    {
        $serviceRepository->remove($service, true);
        return $this->redirectToRoute('app_service_index');
    }
}
