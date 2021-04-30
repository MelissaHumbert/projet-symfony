<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name= "user")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     *
     * @Route ("/new" , name="user_new")
     */
    public function new() : Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setFirstName();
        $user->setLastName();
        $user->setUserEmail();
        $user->setUserName();
        $user->setUserPassword();

        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('');


    }
}
