<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource ;
use Doctrine\ORM\Mapping\JoinColumn;
use phpDocumentor\Reflection\Types\Integer;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource(attributes={"pagination_enabled"=false})
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
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
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Remplacement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Priorite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Etat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Assigne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="dateinterval", nullable=true)
     */
    private $Temps;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Distance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

  /**
     * @ORM\OneToOne(targetEntity=Panneaux::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="Id_panneaux", referencedColumnName="id_pa")
     */
    private $Id_Panneaux;

    /**
      * @ORM\Column(type="integer", nullable=true)
     */
    private $id_contact;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }
    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }
    public function getIdPanneaux(): ?Panneaux
    {
        return $this->Id_Panneaux;
    }

    public function setIdPanneaux(?Panneaux $Id_Panneaux): self
    {
        $this->Id_Panneaux = $Id_Panneaux;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getRemplacement(): ?string
    {
        return $this->Remplacement;
    }

    public function setRemplacement(string $Remplacement): self
    {
        $this->Remplacement = $Remplacement;

        return $this;
    }

    public function getPriorite(): ?string
    {
        return $this->Priorite;
    }

    public function setPriorite(string $Priorite): self
    {
        $this->Priorite = $Priorite;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->Etat;
    }

    public function setEtat(string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

    public function getAssigne(): ?string
    {
        return $this->Assigne;
    }

    public function setAssigne(string $Assigne): self
    {
        $this->Assigne = $Assigne;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getTemps(): ?\DateInterval
    {
        return $this->Temps;
    }

    public function setTemps(\DateInterval $Temps): self
    {
        $this->Temps = $Temps;

        return $this;
    }

    public function getDistance(): ?string
    {
        return $this->Distance;
    }

    public function setDistance(string $Distance): self
    {
        $this->Distance = $Distance;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }


    public function getIdContact(): ?Contact
    {
        return $this->id_contact;
    }

    public function setIdContact(Int $id_contact): self
    {
        $this->id_contact = $id_contact;

        return $this;
    }

 

}