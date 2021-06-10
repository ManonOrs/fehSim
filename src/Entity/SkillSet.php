<?php

namespace App\Entity;

use App\Repository\SkillSetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillSetRepository::class)
 */
class SkillSet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Personnage::class, mappedBy="skillSet")
     */
    private $idPerso;

    /**
     * @ORM\ManyToOne(targetEntity=Skill::class, inversedBy="persoAvec")
     */
    private $skillA;

    /**
     * @ORM\ManyToOne(targetEntity=Skill::class, inversedBy="persoAvec")
     */
    private $skillB;

    /**
     * @ORM\ManyToOne(targetEntity=Skill::class, inversedBy="persoAvec")
     */
    private $skillC;

    /**
     * @ORM\ManyToOne(targetEntity=Support::class, inversedBy="persoAvec")
     */
    private $support;

    /**
     * @ORM\ManyToOne(targetEntity=Special::class, inversedBy="persoAvec")
     */
    private $special;

    /**
     * @ORM\ManyToOne(targetEntity=Arme::class, inversedBy="persoAvec")
     */
    private $arme;

    /**
     * @ORM\Column(type="integer")
     */
    private $hp;

    /**
     * @ORM\Column(type="integer")
     */
    private $atk;

    /**
     * @ORM\Column(type="integer")
     */
    private $spd;

    /**
     * @ORM\Column(type="integer")
     */
    private $def;

    /**
     * @ORM\Column(type="integer")
     */
    private $res;


    public function __construct()
    {
        $this->idPerso = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Personnage[]
     */
    public function getIdPerso(): Collection
    {
        return $this->idPerso;
    }

    public function addIdPerso(Personnage $idPerso): self
    {
        if (!$this->idPerso->contains($idPerso)) {
            $this->idPerso[] = $idPerso;
            $idPerso->setSkillSet($this);
        }

        return $this;
    }

    public function removeIdPerso(Personnage $idPerso): self
    {
        if ($this->idPerso->removeElement($idPerso)) {
            // set the owning side to null (unless already changed)
            if ($idPerso->getSkillSet() === $this) {
                $idPerso->setSkillSet(null);
            }
        }

        return $this;
    }

    public function getSkillA(): ?Skill
    {
        return $this->skillA;
    }

    public function setSkillA(?Skill $skillA): self
    {
        $this->skillA = $skillA;

        return $this;
    }

    public function getSkillB(): ?Skill
    {
        return $this->skillB;
    }

    public function setSkillB(?Skill $skillB): self
    {
        $this->skillB = $skillB;

        return $this;
    }

    public function getSkillC(): ?Skill
    {
        return $this->skillC;
    }

    public function setSkillC(?Skill $skillC): self
    {
        $this->skillC = $skillC;

        return $this;
    }

    public function getSupport(): ?Support
    {
        return $this->support;
    }

    public function setSupport(?Support $support): self
    {
        $this->support = $support;

        return $this;
    }

    public function getSpecial(): ?Special
    {
        return $this->special;
    }

    public function setSpecial(?Special $special): self
    {
        $this->special = $special;

        return $this;
    }

    public function getArme(): ?Arme
    {
        return $this->arme;
    }

    public function setArme(?Arme $arme): self
    {
        $this->arme = $arme;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getAtk(): ?int
    {
        return $this->atk;
    }

    public function setAtk(int $atk): self
    {
        $this->atk = $atk;

        return $this;
    }

    public function getSpd(): ?int
    {
        return $this->spd;
    }

    public function setSpd(int $spd): self
    {
        $this->spd = $spd;

        return $this;
    }

    public function getDef(): ?int
    {
        return $this->def;
    }

    public function setDef(int $def): self
    {
        $this->def = $def;

        return $this;
    }

    public function getRes(): ?int
    {
        return $this->res;
    }

    public function setRes(int $res): self
    {
        $this->res = $res;

        return $this;
    }

}
