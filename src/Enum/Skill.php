<?php

namespace App\Enum;

enum Skill: string
{
    case PHP = 'php';
    case Symfony = 'symfony';
    case Sylius = 'sylius';
    case JavaScript = 'javascript';
    case TypeScript = 'typescript';
    case React = 'react';
    case NextJs = 'nextjs';
    case Python = 'python';
    case Html5 = 'html5';
    case Css3 = 'css3';
    case MySQL = 'mysql';
    case Redis = 'redis';
    case PostgreSQL = 'postgresql';
    case Docker = 'docker';
    case Kubernetes = 'kubernetes';
    case Linux = 'linux';

    public function labelKey(): string
    {
        return "skills.{$this->value}.title";
    }

    public function urlKey(): string
    {
        return "skills.{$this->value}.url";
    }

    public function iconKey(): string
    {
        return "skills.{$this->value}.icon";
    }
}
