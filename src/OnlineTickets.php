<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Hering <der@internethering.de>
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */

namespace Internethering\OnlineTickets;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Internethering\OnlineTickets\DependencyInjection\OnlineTicketsExtension;

class OnlineTickets extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new OnlineTicketsExtension();
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}