<?php

namespace App\Entity;

use App\Repository\SanteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SanteRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Sante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $brithdate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $postal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $regimSocial = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $benificaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nbrBenific = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $creatAt = null;


    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        if ($this->creatAt === null) {
            $this->creatAt = new \DateTimeImmutable();
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getBrithdate():  ?\DateTimeInterface
    {
        return $this->brithdate;
    }

    public function setBrithdate( ?\DateTimeInterface $brithdate): static
    {
        $this->brithdate = $brithdate;

        return $this;
    }

    public function getPostal(): ?string
    {
        return $this->postal;
    }

    public function setPostal(?string $postal): static
    {
        $this->postal = $postal;

        return $this;
    }

    public function getRegimSocial(): ?string
    {
        return $this->regimSocial;
    }

    public function setRegimSocial(?string $regimSocial): static
    {
        $this->regimSocial = $regimSocial;

        return $this;
    }

    public function getBenificaire(): ?string
    {
        return $this->benificaire;
    }

    public function setBenificaire(?string $benificaire): static
    {
        $this->benificaire = $benificaire;

        return $this;
    }

    public function getNbrBenific(): ?string
    {
        return $this->nbrBenific;
    }

    public function setNbrBenific(?string $nbrBenific): static
    {
        $this->nbrBenific = $nbrBenific;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getCreatAt(): ?\DateTimeImmutable
    {
        return $this->creatAt;
    }

    public function setCreatAt(?\DateTimeImmutable $creatAt): static
    {
        $this->creatAt = $creatAt;

        return $this;
    }
}
