<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
    * @Vich\Uploadable
 */
class Recette
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
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file;
    
    /**
     * @Vich\UploadableField(mapping="recette_images", fileNameProperty="file")
     * @var File
     */
    private $imageFile;


    /**
     * @ORM\Column(type="text")
     */
    private $ingredients;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="recettes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrperson;

    /**
     * @ORM\Column(type="integer")
     */
    private $time;

    public function __toString() {
        return $this->getName();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile(File $file = null)
    {
        $this->imageFile = $file;

         if (null !== $file) {
            // Il est nécessaire qu'au moins un champ change si vous utilisez la doctrine
            // sinon les écouteurs d'événements ne seront pas appelés et le fichier sera perdu.
            $this->updatedAt = new \DateTime();
        }
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

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

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getNbrperson(): ?int
    {
        return $this->nbrperson;
    }

    public function setNbrperson(int $nbrperson): self
    {
        $this->nbrperson = $nbrperson;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }
}
