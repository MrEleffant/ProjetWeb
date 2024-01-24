<?php

namespace App\Controller;

use App\Entity\Habitant;
use App\Form\HabitantType;
use App\Repository\HabitantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/habitant/controler')]
class HabitantControlerController extends AbstractController
{
    #[Route('/', name: 'app_habitant_controler_index', methods: ['GET'])]
    public function index(HabitantRepository $habitantRepository): Response
    {
        return $this->render('habitant_controler/index.html.twig', [
            'habitants' => $habitantRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_habitant_controler_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $habitant = new Habitant();
        $form = $this->createForm(HabitantType::class, $habitant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($habitant);
            $entityManager->flush();

            return $this->redirectToRoute('app_habitant_controler_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('habitant_controler/new.html.twig', [
            'habitant' => $habitant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_habitant_controler_show', methods: ['GET'])]
    public function show(Habitant $habitant): Response
    {
        return $this->render('habitant_controler/show.html.twig', [
            'habitant' => $habitant,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_habitant_controler_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Habitant $habitant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HabitantType::class, $habitant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_habitant_controler_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('habitant_controler/edit.html.twig', [
            'habitant' => $habitant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_habitant_controler_delete', methods: ['POST'])]
    public function delete(Request $request, Habitant $habitant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$habitant->getId(), $request->request->get('_token'))) {
            $entityManager->remove($habitant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_habitant_controler_index', [], Response::HTTP_SEE_OTHER);
    }
}
