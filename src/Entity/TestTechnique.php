<?php

namespace App\Entity;

use App\Repository\TestTechniqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestTechniqueRepository::class)
 */
class TestTechnique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=InfoCo::class, mappedBy="testTechnique")
     */
    private $infoCos;

    /**
     * @ORM\ManyToOne(targetEntity=Administrateur::class, inversedBy="testsTechniques")
     */
    private $administrateur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $intitule;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="testTechnique")
     */
    private $questions;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estActif;


    public function __construct()
    {
        $this->infoCos = new ArrayCollection();
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $infoCo->setTestTechnique($this);
        }

        return $this;
    }

    public function removeInfoCo(InfoCo $infoCo): self
    {
        if ($this->infoCos->contains($infoCo)) {
            $this->infoCos->removeElement($infoCo);
            // set the owning side to null (unless already changed)
            if ($infoCo->getTestTechnique() === $this) {
                $infoCo->setTestTechnique(null);
            }
        }

        return $this;
    }

    public function getAdministrateur(): ?Administrateur
    {
        return $this->administrateur;
    }

    public function setAdministrateur(?Administrateur $administrateur): self
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    public function __toString()
    {
    return (string) $this->getIntitule();
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(?string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setTestTechnique($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->contains($question)) {
            $this->questions->removeElement($question);
            // set the owning side to null (unless already changed)
            if ($question->getTestTechnique() === $this) {
                $question->setTestTechnique(null);
            }
        }

        return $this;
    }

    public function getEstActif(): ?bool
    {
        return $this->estActif;
    }

    public function setEstActif(bool $estActif): self
    {
        $this->estActif = $estActif;

        return $this;
    }

    
}
