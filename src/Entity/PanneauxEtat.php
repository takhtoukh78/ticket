<?php

namespace App\Entity;

use App\Repository\PanneauxEtatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PanneauxEtatRepository::class)
 */
class PanneauxEtat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
 
    private $id_paet;

    /**
     * @ORM\Column(type="integer")
     */
    private $panneau_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_heure;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_clips;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_clips_dl;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPaet(): ?int
    {
        return $this->id_paet;
    }

    public function setIdPaet(int $id_paet): self
    {
        $this->id_paet = $id_paet;

        return $this;
    }

    public function getPanneauId(): ?int
    {
        return $this->panneau_id;
    }

    public function setPanneauId(int $panneau_id): self
    {
        $this->panneau_id = $panneau_id;

        return $this;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->date_heure;
    }

    public function setDateHeure(\DateTimeInterface $date_heure): self
    {
        $this->date_heure = $date_heure;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNbClips(): ?int
    {
        return $this->nb_clips;
    }

    public function setNbClips(int $nb_clips): self
    {
        $this->nb_clips = $nb_clips;

        return $this;
    }

    public function getNbClipsDl(): ?int
    {
        return $this->nb_clips_dl;
    }

    public function setNbClipsDl(int $nb_clips_dl): self
    {
        $this->nb_clips_dl = $nb_clips_dl;

        return $this;
    }

}
