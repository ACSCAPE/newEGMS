<?php

namespace App\Entity;

use App\Repository\EscapeGameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EscapeGameRepository::class)
 */
class EscapeGame
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
    private $title;

    /**
     * @ORM\Column(type="time")
     */
    private $duration;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberMin;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberMax;

    /**
     * @ORM\Column(type="boolean")
     */
    private $private;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $excerpt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categoryName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resumeText;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $IntroductionText;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $InstructionsText;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $happyEndText;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gameOverText;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="escapeGames")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Participant::class, mappedBy="escapeGame", orphanRemoval=true)
     */
    private $participants;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $solution;

    /**
     * @ORM\ManyToMany(targetEntity=Module::class, inversedBy="escapeGames")
     */
    private $module;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
        $this->module = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->dateTime;
    }

    public function setDateTime(\DateTimeInterface $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getNumberMin(): ?int
    {
        return $this->numberMin;
    }

    public function setNumberMin(int $numberMin): self
    {
        $this->numberMin = $numberMin;

        return $this;
    }

    public function getNumberMax(): ?int
    {
        return $this->numberMax;
    }

    public function setNumberMax(int $numberMax): self
    {
        $this->numberMax = $numberMax;

        return $this;
    }

    public function getPrivate(): ?bool
    {
        return $this->private;
    }

    public function setPrivate(bool $private): self
    {
        $this->private = $private;

        return $this;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(string $excerpt): self
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): self
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    public function getResumeText(): ?string
    {
        return $this->resumeText;
    }

    public function setResumeText(string $resumeText): self
    {
        $this->resumeText = $resumeText;

        return $this;
    }

    public function getIntroductionText(): ?string
    {
        return $this->IntroductionText;
    }

    public function setIntroductionText(string $IntroductionText): self
    {
        $this->IntroductionText = $IntroductionText;

        return $this;
    }

    public function getInstructionsText(): ?string
    {
        return $this->InstructionsText;
    }

    public function setInstructionsText(string $InstructionsText): self
    {
        $this->InstructionsText = $InstructionsText;

        return $this;
    }

    public function getHappyEndText(): ?string
    {
        return $this->happyEndText;
    }

    public function setHappyEndText(string $happyEndText): self
    {
        $this->happyEndText = $happyEndText;

        return $this;
    }

    public function getGameOverText(): ?string
    {
        return $this->gameOverText;
    }

    public function setGameOverText(string $gameOverText): self
    {
        $this->gameOverText = $gameOverText;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Participant[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(Participant $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->setEscapeGame($this);
        }

        return $this;
    }

    public function removeParticipant(Participant $participant): self
    {
        if ($this->participants->contains($participant)) {
            $this->participants->removeElement($participant);
            // set the owning side to null (unless already changed)
            if ($participant->getEscapeGame() === $this) {
                $participant->setEscapeGame(null);
            }
        }

        return $this;
    }

    public function getSolution(): ?string
    {
        return $this->solution;
    }

    public function setSolution(string $solution): self
    {
        $this->solution = $solution;

        return $this;
    }

    /**
     * @return Collection|Module[]
     */
    public function getModule(): Collection
    {
        return $this->module;
    }

    public function addModule(Module $module): self
    {
        if (!$this->module->contains($module)) {
            $this->module[] = $module;
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        if ($this->module->contains($module)) {
            $this->module->removeElement($module);
        }

        return $this;
    }
    public function __toString(){
        return $this->title;
      }
}
