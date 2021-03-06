<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Entity\TicketConversation;
use App\Form\TicketType;
use App\Repository\TicketConversationRepository;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ticket")
 */
class TicketController extends AbstractController
{
    /**
     * @Route("", name="app_ticket_index", methods={"GET"})
     */
    public function index(TicketRepository $ticketRepository): Response
    {
        return $this->render('ticket/index.html.twig', [
            'tickets' => $ticketRepository->findAll(),
        ]);
    }

    

    /**
     * @Route("/new", name="app_ticket_new", methods={"GET", "POST"})
     */
    public function new(Request $request,TicketConversationRepository $ticketConversationRepository,TicketRepository $ticketRepository): Response
    {
        $ticket = new Ticket();
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $Photo = $form->get('photo')->getData();
            $file = md5(uniqid()) . '.' . $Photo->guessExtension();
            $Photo->move(
                $this->getParameter('photo_directrory'),
                $file
            );
            $id = $ticket->getId();
            $ticket->setPhoto($file);
            $ticketConversation = new TicketConversation();
            $ticketConversation->setIdTicket($id);
            $ticketRepository->add($ticket, true);
            $ticketConversationRepository->add($ticketConversation,true);

            
        }

        return $this->renderForm('ticket/new.html.twig', [
            'ticket' => $ticket,
            'Ticketform' => $form,
        ]);
        if ($form->isSubmitted() && $form->isValid()) {

            return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
    }
    }

    /**
     * @Route("/{id}", name="app_ticket_show", methods={"GET"})
     */
    public function show(Ticket $ticket): Response
    {
        return $this->render('ticket/show.html.twig', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_ticket_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Ticket $ticket, TicketRepository $ticketRepository): Response
    {
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ticketRepository->add($ticket, true);
            return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticket/edit.html.twig', [
            'ticket' => $ticket,
            'Ticketform' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_ticket_delete", methods={"POST"})
     */
    public function delete(Request $request, Ticket $ticket, TicketRepository $ticketRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticket->getId(), $request->request->get('_token'))) {
            $ticketRepository->remove($ticket, true);
        }

        return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
    }
}
