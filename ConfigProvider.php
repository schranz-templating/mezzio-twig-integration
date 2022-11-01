<?php

namespace Schranz\Templating\Integration\Mezzio\Twig;

use Schranz\Templating\Adapter\Twig\TwigRenderer;
use Schranz\Templating\TemplateRenderer\TemplateRendererInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'aliases'   => [
                TemplateRendererInterface::class => TwigRenderer::class,
                TwigRenderer::class => 'schranz_templating.renderer.twig',
            ],
            'factories' => [
                'schranz_templating.renderer.twig' => TwigRendererFactory::class,
            ],
        ];
    }
}
