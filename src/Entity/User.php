<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastname;

    /**
     * @ORM\ManyToMany(targetEntity=InfoCo::class, inversedBy="users")
     */
    private $infosCos;

    /**
     * @ORM\ManyToMany(targetEntity=ReponsePossible::class, inversedBy="users")
     */
    private $reponsesPossibles;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $numeroPE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    public function __construct()
    {
        $this->infosCos = new ArrayCollection();
        $this->reponsesPossibles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(?\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

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

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function __toString()
    {
    return (string) $this->getFirstname(). " " .$this->getLastname();
    }
}
