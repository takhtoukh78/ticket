<?php

namespace App\Entity;

use App\Repository\PanneauxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PanneauxRepository::class)
 */
class Panneaux
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_pa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_pa;

    /**
     * @ORM\Column(type="integer")
     */
    private $groupe_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_pa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gps;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $resolution;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $resolution_video;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $x_y;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pitch;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $cropping;

    /**
     * @ORM\Column(type="integer")
     */
    private $pa_pt_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_resa_max;

    public function getIdPa(): ?int
    {
        return $this->id_pa;
    }

    public function setIdPa(int $id_pa): self
    {
        $this->id_pa = $id_pa;

        return $this;
    }

    public function getNomPa(): ?string
    {
        return $this->nom_pa;
    }

    public function setNomPa(string $nom_pa): self
    {
        $this->nom_pa = $nom_pa;

        return $this;
    }

    public function getGroupeId(): ?int
    {
        return $this->groupe_id;
    }

    public function setGroupeId(int $groupe_id): self
    {
        $this->groupe_id = $groupe_id;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAdressePa(): ?string
    {
        return $this->adresse_pa;
    }

    public function setAdressePa(string $adresse_pa): self
    {
        $this->adresse_pa = $adresse_pa;

        return $this;
    }

    public function getGps(): ?string
    {
        return $this->gps;
    }

    public function setGps(string $gps): self
    {
        $this->gps = $gps;

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

    public function getResolution(): ?string
    {
        return $this->resolution;
    }

    public function setResolution(string $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function getResolutionVideo(): ?string
    {
        return $this->resolution_video;
    }

    public function setResolutionVideo(string $resolution_video): self
    {
        $this->resolution_video = $resolution_video;

        return $this;
    }

    public function getXY(): ?string
    {
        return $this->x_y;
    }

    public function setXY(string $x_y): self
    {
        $this->x_y = $x_y;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCropping(): ?string
    {
        return $this->cropping;
    }

    public function setCropping(string $cropping): self
    {
        $this->cropping = $cropping;

        return $this;
    }

    public function getPaPtId(): ?int
    {
        return $this->pa_pt_id;
    }

    public function setPaPtId(int $pa_pt_id): self
    {
        $this->pa_pt_id = $pa_pt_id;

        return $this;
    }

    public function getNbResaMax(): ?int
    {
        return $this->nb_resa_max;
    }

    public function setNbResaMax(?int $nb_resa_max): self
    {
        $this->nb_resa_max = $nb_resa_max;

        return $this;
    }
}
