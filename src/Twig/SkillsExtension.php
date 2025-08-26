<?php

namespace App\Twig;

use App\Enum\Skill;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SkillsExtension extends AbstractExtension
{
    public function __construct(private TranslatorInterface $translator)
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_skills', [$this, 'getSkills']),
        ];
    }

    /**
     * @return array<string, array{
     *     key: string,
     *     title: string,
     *     url: string,
     *     icon: string
     * }>
     */
    public function getSkills(): array
    {
        $skills = [];

        foreach (Skill::cases() as $skill) {
            $skills[$skill->value] = [
                'key' => $skill->value,
                'title' => $this->translator->trans($skill->labelKey()),
                'url' => $this->translator->trans($skill->urlKey()),
                'icon' => $this->translator->trans($skill->iconKey()),
            ];
        }

        return $skills;
    }
}
