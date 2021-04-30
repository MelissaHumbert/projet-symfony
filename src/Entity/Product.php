<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $productName;

    /**
     * @ORM\Column(type="text")
     */
    private $productDescription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productPicture;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $productPrice;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productCategory;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $regionProduct;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="productUserId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->productDescription;
    }

    public function setProductDescription(string $productDescription): self
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    public function getProductPicture(): ?string
    {
        return $this->productPicture;
    }

    public function setProductPicture(string $productPicture): self
    {
        $this->productPicture = $productPicture;

        return $this;
    }

    public function getProductPrice(): ?string
    {
        return $this->productPrice;
    }

    public function setProductPrice(string $productPrice): self
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getProductCategory(): ?Category
    {
        return $this->productCategory;
    }

    public function setProductCategory(?Category $productCategory): self
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    public function getRegionProduct(): ?Region
    {
        return $this->regionProduct;
    }

    public function setRegionProduct(?Region $regionProduct): self
    {
        $this->regionProduct = $regionProduct;

        return $this;
    }

    public function getProductUser(): ?User
    {
        return $this->productUser;
    }

    public function setProductUser(?User $productUser): self
    {
        $this->productUser = $productUser;

        return $this;
    }
}
