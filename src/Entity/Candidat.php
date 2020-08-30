<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatRepository::class)
 */
class Candidat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $numeroPE;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\ManyToMany(targetEntity=ReponsePossible::class, inversedBy="candidats")
     */
    private $reponsesPossibles;

    /**
     * @ORM\ManyToMany(targetEntity=InfoCo::class, inversedBy="candidats")
     */
    private $infosCos;

    public function __construct()
    {
        $this->reponsesPossibles = new ArrayCollection();
        $this->infosCos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getNumeroPE(): ?string
    {
        return $this->numeroPE;
    }

    public function setNumeroPE(?string $numeroPE): self
    {
        $this->numeroPE = $numeroPE;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * @return Collection|ReponsePossible[]
     */
    public function getReponsesPossibles(): Collection
    {
        return $this->reponsesPossibles;
    }

    public function addReponsesPossible(ReponsePossible $reponsesPossible): self
    {
        if (!$this->reponsesPossibles->contains($reponsesPossible)) {
            $this->reponsesPossibles[] = $reponsesPossible;
        }

        return $this;
    }

    public function removeReponsesPossible(ReponsePossible $reponsesPossible): self
    {
        if ($this->reponsesPossibles->contains($reponsesPossible)) {
            $this->reponsesPossibles->removeElement($reponsesPossible);
        }

        return $this;
    }

    /**
     * @return Collection|InfoCo[]
     */
    public function getInfosCos(): Collection
    {
        return $this->infosCos;
    }

    public function addInfosCo(InfoCo $infosCo): self
    {
        if (!$this->infosCos->contains($infosCo)) {
            $this->infosCos[] = $infosCo;
        }

        return $this;
    }

    public function removeInfosCo(InfoCo $infosCo): self
    {
        if ($this->infosCos->contains($infosCo)) {
            $this->infosCos->removeElement($infosCo);
        }

        return $this;
    }
}
