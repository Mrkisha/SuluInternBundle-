<?php

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mrkisha\SuluInternsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('sulu_core');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('content')
                    ->children()
                        ->arrayNode('structure')
                            ->children()
                                ->arrayNode('paths')
                                    ->children()
                                        ->arrayNode('interns')
                                            ->children()
                                                ->scalarNode('path')->defaultValue('%kernel.project_dir%/vendor/mrkisha/sulu-interns-bundle/src/Resources/config/templates/pages/')->end()
                                                ->scalarNode('type')->defaultValue('page')->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}