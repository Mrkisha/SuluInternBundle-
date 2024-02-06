<?php

namespace Mrkisha\SuluInternsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

class SuluInternsExtension extends Extension implements PrependExtensionInterface
{
    
    public function prepend(ContainerBuilder $container)
    {
        if ($container->hasExtension('sulu_core'))
        {
            $container->prependExtensionConfig(
                'sulu_core',
                [
                    "content" => [
                        "structure" => [
                            "paths" => [
                                "interns" => [
                                    "path" => "%kernel.project_dir%/vendor/mrkisha/sulu-interns-bundle/src/Resources/config/templates/pages/",
                                    "type" => "page",
                                ]
                            ]
                        ]
                    ]
                ]
            );
        }
    }
    
    public function load(array $configs, ContainerBuilder $container)
    {
    }
}