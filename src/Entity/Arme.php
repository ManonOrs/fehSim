<?php

namespace App\Entity;

use App\Repository\ArmeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmeRepository::class)
 */
class Arme
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
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=SkillSet::class, mappedBy="arme")
     */
    private $persoAvec;

    /**
     * @ORM\Column(type="integer")
     */
    private $sp;

    /**
     * @ORM\Column(type="integer")
     */
    private $rng;

    /**
     * @ORM\Column(type="integer")
     */
    private $damage;

    /**
     * @ORM\ManyToMany(targetEntity=Restriction::class, inversedBy="armes")
     */
    private $restriction;

    public function __construct()
    {
        $this->persoAvec = new ArrayCollection();
        $this->restriction = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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
     * @return Collection|SkillSet[]
     */
    public function getPersoAvec(): Collection
    {
        return $this->persoAvec;
    }

    public function addPersoAvec(SkillSet $persoAvec): self
    {
        if (!$this->persoAvec->contains($persoAvec)) {
            $this->persoAvec[] = $persoAvec;
            $persoAvec->setArme($this);
        }

        return $this;
    }

    public function removePersoAvec(SkillSet $persoAvec): self
    {
        if ($this->persoAvec->removeElement($persoAvec)) {
            // set the owning side to null (unless already changed)
            if ($persoAvec->getArme() === $this) {
                $persoAvec->setArme(null);
            }
        }

        return $this;
    }

    public function getSp(): ?int
    {
        return $this->sp;
    }

    public function setSp(int $sp): self
    {
        $this->sp = $sp;

        return $this;
    }

    public function getRng(): ?int
    {
        return $this->rng;
    }

    public function setRng(int $rng): self
    {
        $this->rng = $rng;

        return $this;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): self
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * @return Collection|Restriction[]
     */
    public function getRestriction(): Collection
    {
        return $this->restriction;
    }

    public function addRestriction(Restriction $restriction): self
    {
        if (!$this->restriction->contains($restriction)) {
            $this->restriction[] = $restriction;
        }

        return $this;
    }

    public function removeRestriction(Restriction $restriction): self
    {
        $this->restriction->removeElement($restriction);

        return $this;
    }
}
