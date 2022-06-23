<?php

namespace App\Entity;

use App\Repository\TicketConversationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketConversationRepository::class)
 */
class TicketConversation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\OneToOne(targetEntity=Panneaux::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="Id_panel", referencedColumnName="id_pa")
     */
    private $Id_Panel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $priority;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_creation;

    /**
     * @ORM\OneToOne(targetEntity=Ticket::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="Id_Ticket", referencedColumnName="id")
     */
    private $Id_ticket;

    /**
     * @ORM\OneToOne(targetEntity=Contact::class, cascade={"persist", "remove"})
    * @ORM\JoinColumn(name="Id_Contact", referencedColumnName="id")
     */
    private $Id_contact;

    /**
     * @ORM\OneToOne(targetEntity=Resources::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="Id_Ressource", referencedColumnName="id")
     */
    private $Id_ressource;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getIdPanel(): ?Panneaux
    {
        return $this->Id_Panel;
    }

    public function setIdPanel(?Panneaux $Id_Panel): self
    {
        $this->Id_Panel = $Id_Panel;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_creation;
    }

    public function setDateCreation(\DateTimeInterface $Date_creation): self
    {
        $this->Date_creation = $Date_creation;

        return $this;
    }

    public function getIdTicket(): ?Ticket
    {
        return $this->Id_ticket;
    }
    /**
    * Transform to string
     * 
    * @return string
    */
    public function __toInteger()
    {
        return (string) $this->getIdTicket();
    }

    public function setIdTicket(?Ticket $Id_ticket): self
    {
        $this->Id_ticket = $Id_ticket;

        return $this;
    }

    public function getIdContact(): ?Contact
    {
        return $this->Id_contact;
    }

    public function setIdContact(Int $id_contact): self
    {
        $this->id_contact = $id_contact;

        return $this;
    }


    public function getIdRessource(): ?Resources
    {
        return $this->Id_ressource;
    }

    public function setIdRessource(?Resources $Id_ressource): self
    {
        $this->Id_ressource = $Id_ressource;

        return $this;
    }
}
