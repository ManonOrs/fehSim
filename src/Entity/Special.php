<?php

namespace App\Entity;

use App\Repository\SpecialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialRepository::class)
 */
class Special
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
     * @ORM\OneToMany(targetEntity=SkillSet::class, mappedBy="special")
     */
    private $persoAvec;

    /**
     * @ORM\Column(type="integer")
     */
    private $sp;

    /**
     * @ORM\Column(type="integer")
     */
    private $cd;

    /**
     * @ORM\ManyToMany(targetEntity=Restriction::class, inversedBy="specials")
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
            $persoAvec->setSpecial($this);
        }

        return $this;
    }

    public function removePersoAvec(SkillSet $persoAvec): self
    {
        if ($this->persoAvec->removeElement($persoAvec)) {
            // set the owning side to null (unless already changed)
            if ($persoAvec->getSpecial() === $this) {
                $persoAvec->setSpecial(null);
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

    public function getCd(): ?int
    {
        return $this->cd;
    }

    public function setCd(int $cd): self
    {
        $this->cd = $cd;

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
