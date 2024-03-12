<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarteController extends AbstractController
{
    #[Route('/carte', name: 'app_carte')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $category_items = $categoryRepository->getCategoriesIndexedItems();

        return $this->render('carte/index.html.twig', [
            'products' => $category_items,
        ]);
    }
}
