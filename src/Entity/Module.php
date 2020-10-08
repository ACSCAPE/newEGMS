<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
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
    private $clueText;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $narration;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $goodAnswer;

    /**
     * @ORM\ManyToOne(targetEntity=Enigma::class, inversedBy="modules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enigma;

    /**
     * @ORM\ManyToMany(targetEntity=EscapeGame::class, mappedBy="module")
     */
    private $escapeGames;

    public function __construct()
    {
        $this->escapeGames = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClueText(): ?string
    {
        return $this->clueText;
    }

    public function setClueText(string $clueText): self
    {
        $this->clueText = $clueText;

        return $this;
    }

    public function getNarration(): ?string
    {
        return $this->narration;
    }

    public function setNarration(string $narration): self
    {
        $this->narration = $narration;

        return $this;
    }

    public function getGoodAnswer(): ?string
    {
        return $this->goodAnswer;
    }

    public function setGoodAnswer(?string $goodAnswer): self
    {
        $this->goodAnswer = $goodAnswer;

        return $this;
    }

    public function getEnigma(): ?Enigma
    {
        return $this->enigma;
    }

    public function setEnigma(?Enigma $enigma): self
    {
        $this->enigma = $enigma;

        return $this;
    }

    /**
     * @return Collection|EscapeGame[]
     */
    public function getEscapeGames(): Collection
    {
        return $this->escapeGames;
    }

    public function addEscapeGame(EscapeGame $escapeGame): self
    {
        if (!$this->escapeGames->contains($escapeGame)) {
            $this->escapeGames[] = $escapeGame;
            $escapeGame->addModule($this);
        }

        return $this;
    }

    public function removeEscapeGame(EscapeGame $escapeGame): self
    {
        if ($this->escapeGames->contains($escapeGame)) {
            $this->escapeGames->removeElement($escapeGame);
            $escapeGame->removeModule($this);
        }

        return $this;
    }
}
