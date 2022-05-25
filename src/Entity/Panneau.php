<?php

namespace App\Entity;

use App\Repository\PanneauRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PanneauRepository::class)
 */
class Panneau
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
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diffusion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $flus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $garantie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Specs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Emplacementbox;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaires;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pitch;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resolution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resolutionvid;

    /**
     * @ORM\Column(type="date")
     */
    private $date_creation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getSecteur(): ?string
    {
        return $this->secteur;
    }

    public function setSecteur(string $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    public function getDiffusion(): ?string
    {
        return $this->diffusion;
    }

    public function setDiffusion(string $diffusion): self
    {
        $this->diffusion = $diffusion;

        return $this;
    }

    public function getFlus(): ?string
    {
        return $this->flus;
    }

    public function setFlus(string $flus): self
    {
        $this->flus = $flus;

        return $this;
    }

    public function getGarantie(): ?string
    {
        return $this->garantie;
    }

    public function setGarantie(string $garantie): self
    {
        $this->garantie = $garantie;

        return $this;
    }

    public function getCommande(): ?string
    {
        return $this->commande;
    }

    public function setCommande(string $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getSpecs(): ?string
    {
        return $this->Specs;
    }

    public function setSpecs(string $Specs): self
    {
        $this->Specs = $Specs;

        return $this;
    }

    public function getEmplacementbox()
    {
        return $this->Emplacementbox;
    }

    public function setEmplacementbox(string $Emplacementbox): self
    {
        $this->Emplacementbox = $Emplacementbox;

        return $this;
    }

    public function getPc()
    {
        return $this->pc;
    }

    public function setPc(string $pc): self
    {
        $this->pc = $pc;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getPitch(): ?string
    {
        return $this->pitch;
    }

    public function setPitch(string $pitch): self
    {
        $this->pitch = $pitch;

        return $this;
    }

    public function getResolution(): ?string
    {
        return $this->resolution;
    }

    public function setResolution(string $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function getResolutionvid(): ?string
    {
        return $this->resolutionvid;
    }

    public function setResolutionvid(string $resolutionvid): self
    {
        $this->resolutionvid = $resolutionvid;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }
}
