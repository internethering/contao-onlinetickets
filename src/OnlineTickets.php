<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Hering <der@internethering.de>
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */

namespace Internethering\Isotope\OnlineTickets;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OnlineTickets extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}