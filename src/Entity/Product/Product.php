<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_product')]
class Product extends BaseProduct
{
    /** @ORM\Column(name="color", type="string", nullable=true) */
    #[ORM\Column(name: "color", type: "string", nullable: true)]
    private $color;

    public const COLOR_RED = 'Red';
    public const COLOR_GREEN = 'Green';
    public const COLOR_BLUE = 'Blue';

    public static function showColors()
    {
        return [
            self::COLOR_RED => 'red',
            self::COLOR_GREEN => 'green',
            self::COLOR_BLUE => 'blue',
        ];
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color): void
    {
        $this->color = $color;
    }


    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }
}
