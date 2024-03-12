<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormError;

class AccountPasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/compte/modifier-mot-de-passe', name: 'app_account_password')]
public function index(Request $request, UserPasswordHasherInterface $hasher): Response
{
    $user = $this->getUser();
    $form = $this->createForm(ChangePasswordType::class, $user);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $old_pwd = $form->get('old_password')->getData();

        if (!$hasher->isPasswordValid($user, $old_pwd)) {
            // Ajout d'une erreur au champ spécifique du formulaire si le mot de passe actuel est incorrect
            $form->get('old_password')->addError(new FormError("Le mot de passe actuel est incorrect."));
        } else {
            // La logique de mise à jour du mot de passe si le mot de passe actuel est correct
            $new_pwd = $form->get('new_password')->getData();
            $password = $hasher->hashPassword($user, $new_pwd);

            $user->setPassword($password);
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->addFlash('success', 'Votre mot de passe a bien été mis à jour !');
            
            return $this->redirectToRoute('app_account_password'); // Redirection après mise à jour réussie
        }
    }

    return $this->render('account/password.html.twig', [
        'form' => $form->createView(),
    ]);
}
}
