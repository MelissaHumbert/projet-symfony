<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin
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
    private $adminName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adminPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adminEmail;

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

    public function getAdminName(): ?string
    {
        return $this->adminName;
    }

    public function setAdminName(string $adminName): self
    {
        $this->adminName = $adminName;

        return $this;
    }

    public function getAdminPassword(): ?string
    {
        return $this->adminPassword;
    }

    public function setAdminPassword(string $adminPassword): self
    {
        $this->adminPassword = $adminPassword;

        return $this;
    }

    public function getAdminEmail(): ?string
    {
        return $this->adminEmail;
    }

    public function setAdminEmail(string $adminEmail): self
    {
        $this->adminEmail = $adminEmail;

        return $this;
    }
}
