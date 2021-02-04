<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionRepository::class)
 */
class Section
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="section")
     */
    private $skills;

    /**
     * @ORM\OneToMany(targetEntity=Social::class, mappedBy="section")
     */
    private $socials;

    /**
     * @ORM\OneToMany(targetEntity=CareerStep::class, mappedBy="section")
     */
    private $careerSteps;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->socials = new ArrayCollection();
        $this->careerSteps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $skill->setSection($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getSection() === $this) {
                $skill->setSection(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Social[]
     */
    public function getSocials(): Collection
    {
        return $this->socials;
    }

    public function addSocial(Social $social): self
    {
        if (!$this->socials->contains($social)) {
            $this->socials[] = $social;
            $social->setSection($this);
        }

        return $this;
    }

    public function removeSocial(Social $social): self
    {
        if ($this->socials->removeElement($social)) {
            // set the owning side to null (unless already changed)
            if ($social->getSection() === $this) {
                $social->setSection(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CareerStep[]
     */
    public function getCareerSteps(): Collection
    {
        return $this->careerSteps;
    }

    public function addCareerStep(CareerStep $careerStep): self
    {
        if (!$this->careerSteps->contains($careerStep)) {
            $this->careerSteps[] = $careerStep;
            $careerStep->setSection($this);
        }

        return $this;
    }

    public function removeCareerStep(CareerStep $careerStep): self
    {
        if ($this->careerSteps->removeElement($careerStep)) {
            // set the owning side to null (unless already changed)
            if ($careerStep->getSection() === $this) {
                $careerStep->setSection(null);
            }
        }

        return $this;
    }
}
