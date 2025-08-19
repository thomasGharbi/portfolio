<?php

namespace App\Twig;

use Detection\MobileDetect;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DeviceExtension extends AbstractExtension
{
    public function __construct(private readonly MobileDetect $mobileDetect)
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_mobile', [$this, 'isMobile']),
            new TwigFunction('is_tablet', [$this, 'isTablet']),
            new TwigFunction('is_desktop', [$this, 'isDesktop']),
        ];
    }

    public function isMobile(): bool
    {
        return $this->mobileDetect->isMobile() && !$this->mobileDetect->isTablet();
    }

    public function isTablet(): bool
    {
        return $this->mobileDetect->isTablet();
    }

    public function isDesktop(): bool
    {
        return !$this->isMobile() && !$this->isTablet();
    }
}
