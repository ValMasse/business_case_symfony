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
     * @ORM\ManyToMany(targetEntity=Question::class, mappedBy="testsTechniques")
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity=InfoCo::class, mappedBy="testTechnique")
     */
    private $infoCos;

    /**
     * @ORM\ManyToOne(targetEntity=Administrateur::class, inversedBy="testsTechniques")
     */
    private $administrateur;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->infoCos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $question->addTestsTechnique($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->contains($question)) {
            $this->questions->removeElement($question);
            $question->removeTestsTechnique($this);
        }

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
    return (string) $this->getId();
    }
}
