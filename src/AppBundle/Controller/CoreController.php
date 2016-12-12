<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ContactType;

class CoreController extends Controller
{
    public function indexAction(Request $request)
    {
        $lastArticles = $this->getDoctrine()
            ->getManager()
            ->getRepository('ShiawaBlogBundle:Article')
            ->getLastArticles(4);

        $adherents = $this->getDoctrine()
            ->getManager()
            ->getRepository('ShiawaUserBundle:User')
            ->findByRoles(['ROLE_ADHERENT', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN']);
        shuffle($adherents);

        $events = $this->getDoctrine()
            ->getManager()
            ->getRepository('ShiawaEventBundle:Event')
            ->getNext(2);

        return $this->render('AppBundle:Core:index.html.twig', array(
            'lastArticles' => $lastArticles,
            'adherents' => $adherents,
            'events' => $events
        ));
    }

    public function asideAction() {
        $lastReview = $this->getDoctrine()
            ->getManager()
            ->getRepository('ShiawaBlogBundle:AnimeReview')
            ->getLast(1);

        $nextEvent = $this->getDoctrine()
            ->getManager()
            ->getRepository('ShiawaEventBundle:Event')
            ->getNext(1);

        return $this->render('AppBundle:Anime:aside.html.twig', array(
            'lastReview' => $lastReview,
            'nextEvent' => $nextEvent
        ));
    }

    public function contactAction(Request $request) {
        $user = $this->getUser();

        $form = $this->createForm(ContactType::class, $user);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            //envoi d'e-mail
            
            $message = \Swift_Message::newInstance()
                ->setSubject($form->get('subject')->getData())
                ->setFrom($form->get('email')->getData())
                //->setTo('shiawa.project@gmail.com')
                ->setTo($this->getParameter('mail'))
                ->setBody(
                    $this->renderView(
                        'AppBundle:Emails:contact.html.twig',
                        array(
                            'name' => $form->get('username')->getData(),
                            'content' => $form->get('message')->getData()
                        )
                    ),
                    'text/html'
                )
            ;
            $this->get('mailer')->send($message);

            $request->getSession()->getFlashBag()->add('success', 'Votre e-mail a bien été envoyé.');

            return $this->redirectToRoute('contact');
        }

        return $this->render('AppBundle:Core:contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
