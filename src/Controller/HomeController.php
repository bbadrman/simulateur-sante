<?php

namespace App\Controller;

use App\Entity\Sante;
use App\Form\SanteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $sante = new Sante();
        $form = $this->createForm(SanteType::class, $sante);
        $form->handleRequest($request);

        // if ($form->isSubmitted()) {
        //     dump($form->getErrors(true)); // 🔎 debug utile
        // }

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sante);
            $entityManager->flush();

            $this->addFlash('success', 'Formulaire enregistré avec succès !');
            return $this->redirectToRoute('app_reponse', [], Response::HTTP_SEE_OTHER);
        }


        return $this->render(
            'home/index.html.twig',
            [
                'sante' => $sante,
                'form' => $form,
            ]
        );
    }

    #[Route('/politique-legale', name: 'app_politique-legale')]
    public function politique(): Response
    {
        return $this->render(
            'home/politique-legale.html.twig'
        );
    }

    #[Route('/mention-legale', name: 'app_mention-legale')]
    public function mention(): Response
    {
        return $this->render(
            'home/mention-legale.html.twig'
        );
    }


    #[Route('/reponse', name: 'app_reponse')]
    public function reponse(): Response
    {

        return $this->render('home/reponse.html.twig', []);
    }
}
