<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Service\TodayGenerator;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(Request $request, MailerInterface $mailer, TodayGenerator $todayGenerator): Response
    {
        // La date du jour, récupérée dans le service generateAToday
        $today = $todayGenerator->generateAToday();

        // TODO: TECHNOS




        // TODO: EXPERIENCES


        

        // TODO: LOISIRSETDIVERS




        // TODO: DIPLOMES





        // Formulaire
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
                // On redirige vers la même page (home), sur l'ancre top
                return $this->redirectToRoute('home', ['_fragment' => 'top']);
            }
        }


        $form = $this->createForm(ContactType::class);

        return $this->render('home/index.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }


    /** ======= Méthode: Envoi d'email en html, dont le corps est cherché dans une page twig ========
     *
     */
    private function envoiEmail($mailer, $expediteur, $destinataire, $templateTwig, $objet, $contact)
    {
        $email = (new TemplatedEmail())
            ->from($expediteur)
            ->to($destinataire)
            ->subject($objet)
            ->htmlTemplate($templateTwig)
            // Envoi les paramètres à la page twig
            ->context([
                'contact' => $contact
            ]);
        $mailer->send($email);
    }
}
