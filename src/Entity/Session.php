<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionRepository::class)
 */
class Session
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=VilleSession::class, inversedBy="sessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $villeSession;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="sessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;

    /**
     * @ORM\OneToMany(targetEntity=InfoCo::class, mappedBy="session")
     */
    private $infoCos;

    /**
     * @ORM\ManyToOne(targetEntity=ChefProjet::class, inversedBy="sessions")
     */
    private $chefProjet;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    public function __construct()
    {
        $this->infoCos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilleSession(): ?VilleSession
    {
        return $this->villeSession;
    }

    public function setVilleSession(?VilleSession $villeSession): self
    {
        $this->villeSession = $villeSession;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

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
            $infoCo->setSession($this);
        }

        return $this;
    }

    public function removeInfoCo(InfoCo $infoCo): self
    {
        if ($this->infoCos->contains($infoCo)) {
            $this->infoCos->removeElement($infoCo);
            // set the owning side to null (unless already changed)
            if ($infoCo->getSession() === $this) {
                $infoCo->setSession(null);
            }
        }

        return $this;
    }

    public function getChefProjet(): ?ChefProjet
    {
        return $this->chefProjet;
    }

    public function setChefProjet(?ChefProjet $chefProjet): self
    {
        $this->chefProjet = $chefProjet;

        return $this;
    }

    public function __toString()
    {
    return (string) $this->getId(). " " .$this->getFormation(). " " .$this->getVilleSession();
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
}
