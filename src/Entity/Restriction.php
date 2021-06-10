<?php

namespace App\Entity;

use App\Repository\RestrictionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RestrictionRepository::class)
 */
class Restriction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, mappedBy="restriction")
     */
    private $skills;

    /**
     * @ORM\ManyToMany(targetEntity=Support::class, mappedBy="restriction")
     */
    private $supports;

    /**
     * @ORM\ManyToMany(targetEntity=Special::class, mappedBy="restriction")
     */
    private $specials;

    /**
     * @ORM\ManyToMany(targetEntity=Arme::class, mappedBy="restriction")
     */
    private $armes;


    public function __construct()
    {
        $this->no = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->supports = new ArrayCollection();
        $this->specials = new ArrayCollection();
        $this->armes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->addRestriction($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            $skill->removeRestriction($this);
        }

        return $this;
    }

    /**
     * @return Collection|Support[]
     */
    public function getSupports(): Collection
    {
        return $this->supports;
    }

    public function addSupport(Support $support): self
    {
        if (!$this->supports->contains($support)) {
            $this->supports[] = $support;
            $support->addRestriction($this);
        }

        return $this;
    }

    public function removeSupport(Support $support): self
    {
        if ($this->supports->removeElement($support)) {
            $support->removeRestriction($this);
        }

        return $this;
    }

    /**
     * @return Collection|Special[]
     */
    public function getSpecials(): Collection
    {
        return $this->specials;
    }

    public function addSpecial(Special $special): self
    {
        if (!$this->specials->contains($special)) {
            $this->specials[] = $special;
            $special->addRestriction($this);
        }

        return $this;
    }

    public function removeSpecial(Special $special): self
    {
        if ($this->specials->removeElement($special)) {
            $special->removeRestriction($this);
        }

        return $this;
    }

    /**
     * @return Collection|Arme[]
     */
    public function getArmes(): Collection
    {
        return $this->armes;
    }

    public function addArme(Arme $arme): self
    {
        if (!$this->armes->contains($arme)) {
            $this->armes[] = $arme;
            $arme->addRestriction($this);
        }

        return $this;
    }

    public function removeArme(Arme $arme): self
    {
        if ($this->armes->removeElement($arme)) {
            $arme->removeRestriction($this);
        }

        return $this;
    }
}
