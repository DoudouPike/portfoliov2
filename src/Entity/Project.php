<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="projects")
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist", "remove"})
     */
    private $thumbnail;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Technology", mappedBy="project")
     */
    private $technologies;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $completed;

    public function __construct()
    {
        $this->technologies = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getThumbnail(): ?Image
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?Image $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getTechnologies()
    {
        return $this->technologies;
    }

    public function addTechnology(Technology $technology)
    {
        $this->technologies[] = $technology;
    }

    public function removeTechnology(Technology $technology)
    {
        $this->technologies->removeElement($technology);
    }

    public function setTechnologies(array $technologies)
    {
        $this->technologies = $technologies;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(bool $completed): self
    {
        $this->completed = $completed;

        return $this;
    }
}
