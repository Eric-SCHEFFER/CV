<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        // TODO: Formulaire
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            if (!isset($contact['motif']) && isset($_SERVER['HTTP_ORIGIN'])) {
                $expediteur = $contact['email'];
                $objet = $contact['objet'];
                $destinataire = 'ericsch2e@gmail.com';
                $templateTwig = "emails/contact.html.twig";

                // Envoi du mail contenant les données du formulaire
                $this->envoiEmail($mailer, $expediteur, $destinataire, $templateTwig, $objet, $contact);
                $this->addFlash('succes', 'Le message à bien été envoyé');
                return $this->redirectToRoute('home');
            }
        }


        $form = $this->createForm(ContactType::class);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
