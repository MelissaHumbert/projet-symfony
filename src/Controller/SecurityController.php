<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterType;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{

        private EntityManagerInterface $entityManager;

        public function __construct(EntityManagerInterface $entityManager)
        {
        $this->entityManager = $entityManager;
        }


        #[Route('/register', name: 'security_register')]
        public function register(Request $request, UserPasswordEncoderInterface $encoder): Response
        {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        //Analyse de la Requete
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
        //Traitement des données reçues
        $hash = $encoder->encodePassword($user, $user->getPassword());
        $user->setPassword($hash);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->redirectToRoute("security_login");

        }

        return $this->render('security/index.html.twig', [
        'controller_name' => 'Inscription',
        'form' => $form->createView()
        ]);
        }

        /**
         * @Route("/login", name="security_login")
         *
         */
        public function login(): Response {
            return $this->render('security/login.html.twig');
        }

    /**
     * @Route("/logout", name="security_logout")
     *
     */
    public function logout(): Response {
       // return $this->render('security/logout.html.twig');
    }
}
