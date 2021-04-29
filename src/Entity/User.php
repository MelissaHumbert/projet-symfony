<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userEmail;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="productUser")
     */
    private $productUserId;

    public function __construct()
    {
        $this->productUserId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->userPassword;
    }

    public function setUserPassword(string $userPassword): self
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProductUserId(): Collection
    {
        return $this->productUserId;
    }

    public function addProductUserId(Product $productUserId): self
    {
        if (!$this->productUserId->contains($productUserId)) {
            $this->productUserId[] = $productUserId;
            $productUserId->setProductUser($this);
        }

        return $this;
    }

    public function removeProductUserId(Product $productUserId): self
    {
        if ($this->productUserId->removeElement($productUserId)) {
            // set the owning side to null (unless already changed)
            if ($productUserId->getProductUser() === $this) {
                $productUserId->setProductUser(null);
            }
        }

        return $this;
    }
}
