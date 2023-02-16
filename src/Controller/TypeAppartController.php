<?php

namespace App\Controller;

use App\Entity\TypeAppart;
use App\Form\TypeAppartType;
use App\Repository\TypeAppartRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/appart')]
class TypeAppartController extends AbstractController
{
    #[Route('/', name: 'app_type_appart_index', methods: ['GET'])]
    public function index(TypeAppartRepository $typeAppartRepository): Response
    {
        return $this->render('type_appart/index.html.twig', [
            'type_apparts' => $typeAppartRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_appart_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeAppartRepository $typeAppartRepository): Response
    {
        $typeAppart = new TypeAppart();
        $form = $this->createForm(TypeAppartType::class, $typeAppart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeAppartRepository->save($typeAppart, true);

            return $this->redirectToRoute('app_type_appart_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_appart/new.html.twig', [
            'type_appart' => $typeAppart,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_appart_show', methods: ['GET'])]
    public function show(TypeAppart $typeAppart): Response
    {
        return $this->render('type_appart/show.html.twig', [
            'type_appart' => $typeAppart,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_appart_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeAppart $typeAppart, TypeAppartRepository $typeAppartRepository): Response
    {
        $form = $this->createForm(TypeAppartType::class, $typeAppart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeAppartRepository->save($typeAppart, true);

            return $this->redirectToRoute('app_type_appart_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_appart/edit.html.twig', [
            'type_appart' => $typeAppart,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_appart_delete', methods: ['POST'])]
    public function delete(Request $request, TypeAppart $typeAppart, TypeAppartRepository $typeAppartRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeAppart->getId(), $request->request->get('_token'))) {
            $typeAppartRepository->remove($typeAppart, true);
        }

        return $this->redirectToRoute('app_type_appart_index', [], Response::HTTP_SEE_OTHER);
    }
}
