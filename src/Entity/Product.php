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
     * @ORM\ManyToOne(targetEntity=category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productCategory;

    /**
     * @ORM\ManyToOne(targetEntity=region::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $regionProduct;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="productUserId")
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

    public function getProductCategory(): ?category
    {
        return $this->productCategory;
    }

    public function setProductCategory(?category $productCategory): self
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    public function getRegionProduct(): ?region
    {
        return $this->regionProduct;
    }

    public function setRegionProduct(?region $regionProduct): self
    {
        $this->regionProduct = $regionProduct;

        return $this;
    }

    public function getProductUser(): ?user
    {
        return $this->productUser;
    }

    public function setProductUser(?user $productUser): self
    {
        $this->productUser = $productUser;

        return $this;
    }
}
