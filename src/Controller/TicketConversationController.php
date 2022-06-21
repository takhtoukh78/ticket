<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Entity\TicketConversation;
use App\Form\TicketConversationType;
use App\Repository\TicketConversationRepository;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ticketconversation")
 */
class TicketConversationController extends AbstractController
{
    /**
     * @Route("/", name="app_ticket_conversation_index", methods={"GET"})
     */
    public function index(TicketConversationRepository $ticketConversationRepository): Response
    {
        return $this->render('ticket_conversation/index.html.twig', [
            'ticket_conversations' => $ticketConversationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_ticket_conversation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TicketConversationRepository $ticketConversationRepository): Response
    {
        $ticketConversation = new TicketConversation();
        $form = $this->createForm(TicketConversationType::class, $ticketConversation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ticketConversationRepository->add($ticketConversation, true);

            return $this->redirectToRoute('app_ticket_conversation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticket_conversation/new.html.twig', [
            'ticket_conversation' => $ticketConversation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_ticket_conversation_show", methods={"GET"})
     */
    public function show(TicketConversationRepository $ticketConversationRepository,TicketConversation $ticketConversation,TicketRepository $ticketRepository): Response
    {
        
        return $this->render('ticket_conversation/show.html.twig', [
            'ticket_conversation' => $ticketConversation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_ticket_conversation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TicketConversation $ticketConversation, TicketConversationRepository $ticketConversationRepository): Response
    {
        $form = $this->createForm(TicketConversationType::class, $ticketConversation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ticketConversationRepository->add($ticketConversation, true);

            return $this->redirectToRoute('app_ticket_conversation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticket_conversation/edit.html.twig', [
            'ticket_conversation' => $ticketConversation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_ticket_conversation_delete", methods={"POST"})
     */
    public function delete(Request $request, TicketConversation $ticketConversation, TicketConversationRepository $ticketConversationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticketConversation->getId(), $request->request->get('_token'))) {
            $ticketConversationRepository->remove($ticketConversation, true);
        }

        return $this->redirectToRoute('app_ticket_conversation_index', [], Response::HTTP_SEE_OTHER);
    }
}
