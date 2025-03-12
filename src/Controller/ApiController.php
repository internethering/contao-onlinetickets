<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * Copyright (c) 2016-2017 Richard Hering
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Hering
 * @copyright 2016-2017 Richard Henkenjohann, 2020-2025 Richard Hering
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */


namespace Internethering\Isotope\OnlineTickets\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Internethering\Isotope\OnlineTickets\Api\EntryPoint;

/**
 * ApiController provides all routes.
 *
 * @Route(defaults={"_scope" = "frontend"})
 */
class ApiController
{
    /**
     * Block content
     *
     * @Route("/api/{action}", name="onlinetickets_api")
     */
    public function apiAction(Request $request): Response
    {
        $controller = new EntryPoint();
        $controller->run();
    }
}
