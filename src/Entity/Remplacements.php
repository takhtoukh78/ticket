<?php

namespace App\Entity;

use App\Repository\RemplacementsRepository;
use ApiPlatform\Core\Annotation\ApiResource ;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(attributes={"pagination_enabled"=false})
 * @ORM\Entity(repositoryClass=RemplacementsRepository::class)
 */
class Remplacements
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Resources::class, mappedBy="remplacements")
     */
    private $Resources;

    public function __construct()
    {
        $this->Resources = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    /**
     * @return Collection<int, Resources>
     */
    public function getResources(): Collection
    {
        return $this->Resources;
    }

    public function addResource(Resources $resource): self
    {
        if (!$this->Resources->contains($resource)) {
            $this->Resources[] = $resource;
            $resource->setRemplacements($this);
        }

        return $this;
    }

    public function removeResource(Resources $resource): self
    {
        if ($this->Resources->removeElement($resource)) {
            // set the owning side to null (unless already changed)
            if ($resource->getRemplacements() === $this) {
                $resource->setRemplacements(null);
            }
        }

        return $this;
    }
}
