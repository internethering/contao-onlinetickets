<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Hering <der@internethering.de>
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */

namespace Internethering\OnlineTickets\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Config\ConfigInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Config\ContainerBuilder;
use Contao\ManagerPlugin\Config\ExtensionPluginInterface;
use Contao\ManagerPlugin\Routing\RoutingPluginInterface;
use Internethering\OnlineTickets\OnlineTickets;
use HeimrichHannot\UtilsBundle\Container\ContainerUtil;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;


class Plugin implements BundlePluginInterface, RoutingPluginInterface, ExtensionPluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(OnlineTickets::class)
                ->setLoadAfter(['isotope', ContaoCoreBundle::class]),
        ];
    }

    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    {
        $file = __DIR__.'/../../config/routes.yaml';
        return $resolver->resolve($file)->load($file);
    }

    public function registerContainerConfiguration(LoaderInterface $loader, array $managerConfig)
    {
        $loader->load(__DIR__.'/../../config/services.yaml');
    }

    /**
     * {@inheritdoc}
     */
    public function getExtensionConfig($extensionName, array $extensionConfigs, ContainerBuilder $container)
    {
        if ('security' === $extensionName) {
            $extensionConfigs = $this->getSecurityExtensionConfig($extensionConfigs, $container);
        }
        return $extensionConfigs;
    }

    /**
     * Get security extension config.
     *
     * @return array
     */
    public function getSecurityExtensionConfig(array $extensionConfigs, ContainerBuilder $container)
    {
        $firewalls = [
            'onlinetickets_api_login' => [
                'request_matcher' => 'internethering.onlinetickets.routing.login.matcher',
                'stateless' => true,
                'guard' => [
                    'authenticators' => ['internethering.onlinetickets.security.username_password_authenticator'],
                ],
                'provider' => 'contao.security.backend_user_provider',
            ],
            'onlinetickets_api_action' => [
                'request_matcher' => 'internethering.onlinetickets.routing.matcher',
                'stateless' => true,
                'guard' => [
                    'authenticators' => ['internethering.onlinetickets.security.token_authenticator'],
                ],
                'provider' => 'internethering.onlinetickets.security.user_provider',
            ],
        ];

        $providers = [
            'internethering.onlinetickets.security.user_provider' => [
                'id' => 'internethering.onlinetickets.security.user_provider',
            ],
        ];

        foreach ($extensionConfigs as &$extensionConfig) {
            $extensionConfig['firewalls'] = (isset($extensionConfig['firewalls']) && \is_array($extensionConfig['firewalls']) ? $extensionConfig['firewalls'] : []) + $firewalls;
            $extensionConfig['providers'] = (isset($extensionConfig['providers']) && \is_array($extensionConfig['providers']) ? $extensionConfig['providers'] : []) + $providers;
        }

        return $extensionConfigs;
    }
}