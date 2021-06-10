<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnageRepository::class)
 */
class Personnage
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
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $rarete;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $armeType;

    /**
     * @ORM\ManyToOne(targetEntity=SkillSet::class, inversedBy="idPerso")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skillSet;

    /**
     * @ORM\Column(type="text")
     */
    private $imageDefault;

    /**
     * @ORM\Column(type="text")
     */
    private $imageAtack;

    /**
     * @ORM\Column(type="text")
     */
    private $imageSpecial;

    /**
     * @ORM\Column(type="text")
     */
    private $imageInjured;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getRarete(): ?int
    {
        return $this->rarete;
    }

    public function setRarete(int $rarete): self
    {
        $this->rarete = $rarete;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getArmeType(): ?string
    {
        return $this->armeType;
    }

    public function setArmeType(string $armeType): self
    {
        $this->armeType = $armeType;

        return $this;
    }

    public function getSkillSet(): ?SkillSet
    {
        return $this->skillSet;
    }

    public function setSkillSet(?SkillSet $skillSet): self
    {
        $this->skillSet = $skillSet;

        return $this;
    }

    public function getImageDefault(): ?string
    {
        return $this->imageDefault;
    }

    public function setImageDefault(string $imageDefault): self
    {
        $this->imageDefault = $imageDefault;

        return $this;
    }

    public function getImageAtack(): ?string
    {
        return $this->imageAtack;
    }

    public function setImageAtack(string $imageAtack): self
    {
        $this->imageAtack = $imageAtack;

        return $this;
    }

    public function getImageSpecial(): ?string
    {
        return $this->imageSpecial;
    }

    public function setImageSpecial(string $imageSpecial): self
    {
        $this->imageSpecial = $imageSpecial;

        return $this;
    }

    public function getImageInjured(): ?string
    {
        return $this->imageInjured;
    }

    public function setImageInjured(string $imageInjured): self
    {
        $this->imageInjured = $imageInjured;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }
}
