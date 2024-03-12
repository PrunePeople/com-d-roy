<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DotsExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('dots', [$this, 'addDots']),
        ];
    }

    public function addDots($item)
    {
        $name = $item->getName();
        $price = $item->getPrice();
        $combinedLength = strlen($name) + strlen($price);
        $maxLength = 90;
        $dotsCount = $maxLength - $combinedLength;
        $dots = str_repeat('.', $dotsCount);
        return $name . $dots . $price;
    }
}