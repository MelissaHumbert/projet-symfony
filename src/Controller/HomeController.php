<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private ProductRepository $productRepository;

    private CategoryRepository $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    //= productController
    #[Route('/', name: 'home')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        //$repository = $this->getDoctrine()->getRepository(Product::class);
        $product = $this->productRepository->findAll();

        return $this->render('home/index.html.twig', [
            'product' => $product,
            'category' => $category
        ]);
    }

    #[Route('/show{id}', name: 'show')]
    public function show(Product $product): Response
    {
        //$repository = $this->getDoctrine()->getRepository(Product::class);
        //$product = $this->productRepository->find($id);

        if (!$product) {
            return $this->redirectToRoute('home');
        }
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }



    /**
     *
     * @Route("/showByCategory{id}", name= "show_cat")
     */
    public function showByCat(?Category $category, $id): Response
    {
        if ($category){
            $product = $category->getProducts()->getValues();
        }else{
            return $this->redirectToRoute('home');
        }

        $category = $this->categoryRepository->findAll();
        return $this->render('product/showByCat.html.twig',[
            'product' => $product,
            'category' => $category
        ]);
    }


}
