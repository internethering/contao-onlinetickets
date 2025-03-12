<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Hering <der@internethering.de>
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */

namespace Internethering\Isotope\OnlineTickets\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class OnlineticketsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        (new YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config')))->load('services.yaml');
    }
}