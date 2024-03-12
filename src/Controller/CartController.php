<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Item;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/mon-panier', name: 'cart')]

    public function index(Cart $cart, CategoryRepository $categoryRepository): Response
    {
        $cartComplete = [];
        $boissons = [];

        $category_items = $categoryRepository->getCategoriesIndexedItems();
        for($i = 0; $i < count($category_items['Vin']); $i++) {
            array_push($boissons, $category_items['Vin'][$i]);
        }

        if ($cart->get()) {
            foreach ($cart->get() as $id => $quantity) {
                $cartComplete[] = [
                    'item' => $this->entityManager->getRepository(Item::class)->findOneById($id),
                    'quantity' => $quantity
                ];
            }
        }
        return $this->render('cart/index.html.twig', [
            'cart' => $cartComplete,
            'boissons' => $boissons
        ]);
    }

    #[Route('/cart/add/{id}', name: 'add_to_cart')]

    public function add(Cart $cart, $id): Response
    {
        $cart->add($id);

        return $this->redirectToRoute('cart');
    }

    #[Route('/cart/remove/{id}', name: 'remove_to_cart')]

    public function remove(Cart $cart): Response
    {
        $cart->remove();

        return $this->redirectToRoute('app_item_index');
    }

    #[Route('/cart/delete/{id}', name: 'delete_to_cart')]

    public function delete(Cart $cart, $id): Response
    {
        $cart->delete($id);

        return $this->redirectToRoute('cart');
    }


    #[Route('/cart/decrease/{id}', name: 'decrease_to_cart')]

    public function decrease(Cart $cart, $id): Response
    {
        $cart->decrease($id);

        return $this->redirectToRoute('cart');
    }


}