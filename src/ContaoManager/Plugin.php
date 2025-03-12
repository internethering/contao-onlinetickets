<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Hering <der@internethering.de>
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */

namespace Internethering\Isotope\OnlineTickets\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

use Internethering\Isotope\OnlineTickets\OnlineTickets;

use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class Plugin implements BundlePluginInterface, RoutingPluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(OnlineTickets::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }

    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    {
        //return $resolver->resolve(__DIR__.'/../Controller', 'attribute')->load(__DIR__.'/../Controller');
        return $resolver->resolve(__DIR__.'/../../config/routes.yaml')->load(__DIR__.'/../../config/routes.yaml');
    }
}