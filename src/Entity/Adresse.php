<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdresseRepository::class)
 */
class Adresse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=38)
     */
    private $ligne1;

    /**
     * @ORM\Column(type="string", length=38, nullable=true)
     */
    private $ligne2;

    /**
     * @ORM\Column(type="string", length=38, nullable=true)
     */
    private $ligne3;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $commune;

    /**
     * @ORM\OneToMany(targetEntity=InfoCo::class, mappedBy="adresse")
     */
    private $infoCos;

    public function __construct()
    {
        $this->infoCos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigne1(): ?string
    {
        return $this->ligne1;
    }

    public function setLigne1(string $ligne1): self
    {
        $this->ligne1 = $ligne1;

        return $this;
    }

    public function getLigne2(): ?string
    {
        return $this->ligne2;
    }

    public function setLigne2(?string $ligne2): self
    {
        $this->ligne2 = $ligne2;

        return $this;
    }

    public function getLigne3(): ?string
    {
        return $this->ligne3;
    }

    public function setLigne3(?string $ligne3): self
    {
        $this->ligne3 = $ligne3;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * @return Collection|InfoCo[]
     */
    public function getInfoCos(): Collection
    {
        return $this->infoCos;
    }

    public function addInfoCo(InfoCo $infoCo): self
    {
        if (!$this->infoCos->contains($infoCo)) {
            $this->infoCos[] = $infoCo;
            $infoCo->setAdresse($this);
        }

        return $this;
    }

    public function removeInfoCo(InfoCo $infoCo): self
    {
        if ($this->infoCos->contains($infoCo)) {
            $this->infoCos->removeElement($infoCo);
            // set the owning side to null (unless already changed)
            if ($infoCo->getAdresse() === $this) {
                $infoCo->setAdresse(null);
            }
        }

        return $this;
    }
}
