<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enonce;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estEliminatoire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estActif;

    /**
     * @ORM\ManyToOne(targetEntity=Domaine::class, inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $domaine;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class, inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau;

    /**
     * @ORM\OneToMany(targetEntity=ReponsePossible::class, mappedBy="question", orphanRemoval=true)
     */
    private $reponsesPossibles;

    /**
     * @ORM\ManyToMany(targetEntity=TestTechnique::class, inversedBy="questions")
     */
    private $testsTechniques;

    /**
     * @ORM\ManyToMany(targetEntity=Administrateur::class, mappedBy="questions")
     */
    private $administrateurs;

    public function __construct()
    {
        $this->reponsesPossibles = new ArrayCollection();
        $this->testsTechniques = new ArrayCollection();
        $this->administrateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getEnonce(): ?string
    {
        return $this->enonce;
    }

    public function setEnonce(string $enonce): self
    {
        $this->enonce = $enonce;

        return $this;
    }

    public function getEstEliminatoire(): ?bool
    {
        return $this->estEliminatoire;
    }

    public function setEstEliminatoire(bool $estEliminatoire): self
    {
        $this->estEliminatoire = $estEliminatoire;

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

    public function getDomaine(): ?Domaine
    {
        return $this->domaine;
    }

    public function setDomaine(?Domaine $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

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
            $reponsesPossible->setQuestion($this);
        }

        return $this;
    }

    public function removeReponsesPossible(ReponsePossible $reponsesPossible): self
    {
        if ($this->reponsesPossibles->contains($reponsesPossible)) {
            $this->reponsesPossibles->removeElement($reponsesPossible);
            // set the owning side to null (unless already changed)
            if ($reponsesPossible->getQuestion() === $this) {
                $reponsesPossible->setQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TestTechnique[]
     */
    public function getTestsTechniques(): Collection
    {
        return $this->testsTechniques;
    }

    public function addTestsTechnique(TestTechnique $testsTechnique): self
    {
        if (!$this->testsTechniques->contains($testsTechnique)) {
            $this->testsTechniques[] = $testsTechnique;
        }

        return $this;
    }

    public function removeTestsTechnique(TestTechnique $testsTechnique): self
    {
        if ($this->testsTechniques->contains($testsTechnique)) {
            $this->testsTechniques->removeElement($testsTechnique);
        }

        return $this;
    }

    /**
     * @return Collection|Administrateur[]
     */
    public function getAdministrateurs(): Collection
    {
        return $this->administrateurs;
    }

    public function addAdministrateur(Administrateur $administrateur): self
    {
        if (!$this->administrateurs->contains($administrateur)) {
            $this->administrateurs[] = $administrateur;
            $administrateur->addQuestion($this);
        }

        return $this;
    }

    public function removeAdministrateur(Administrateur $administrateur): self
    {
        if ($this->administrateurs->contains($administrateur)) {
            $this->administrateurs->removeElement($administrateur);
            $administrateur->removeQuestion($this);
        }

        return $this;
    }
}
