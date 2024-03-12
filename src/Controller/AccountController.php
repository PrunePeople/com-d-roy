<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

class AccountController extends AbstractController
{
    #[Route('/compte', name: 'app_account')]
    public function index(): Response
    {
        return $this->render('account/index.html.twig');
    }

    #[Route('/compte/modifier', name: 'app_account_edit')]
    public function edit(Request $request, UserInterface $user): Response
    {
        // Créez ici votre formulaire de modification des informations de l'utilisateur.
        // Utilisez $form->handleRequest($request) pour traiter le formulaire
        // et $form->isSubmitted() && $form->isValid() pour vérifier si le formulaire est valide et soumis.

        return $this->render('account/edit.html.twig', [
            // 'form' => $form->createView(),
            // Ajoutez d'autres variables au besoin
        ]);
    }
}