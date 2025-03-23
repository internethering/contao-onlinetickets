<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * Copyright (c) 2016-2017 Richard Henkenjohann
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Henkenjohann <richardhenkenjohann@googlemail.com>
 * @copyright 2016-2017 Richard Henkenjohann
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */


namespace Internethering\OnlineTickets\Api;

use Contao\Controller;
use Contao\Input;
use Contao\System;
use Internethering\OnlineTickets\Helper\ApiUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Contao\BackendUser;
use Contao\FrontendUser;

/**
 * Class AbstractApi
 *
 * @package Internethering\OnlineTickets\Api
 */
abstract class AbstractApi
{
    private $security;

    /**
     * AbstractApi constructor.
     */
    public function __construct()
    {
        Controller::loadLanguageFile('default');
        $this->security = System::getContainer()->get('security.helper');
    }

    /**
     * Get a submitted parameter
     *
     * @param string $key
     *
     * @return mixed
     */
    protected function getParameter($key)
    {
        return Input::get($key);
    }

    /**
     * Authenticate the submitted token or exit otherwise
     */
    protected function authenticateToken()
    {
        var_dump($this->security->getToken()->getUser());
        if (($user = $this->security->getUser()) instanceof BackendUser) {

        } else {
            $this->exitWithError(2); //$this->security->getToken()
        }
//        $userHash = $this->getParameter('token');
//        if (!$this->user->setHash($userHash)->authenticate()) {
//            $this->exitWithError();
//        }
    }

    /**
     * Exit with json formatted error message
     *
     * @param int $code The error code as defined in @see ApiErrors
     */
    protected function exitWithError($code = null, $message = null)
    {
        if (null === $code) {
            $code = ApiErrors::UNKNOWN_ERROR;
        }

        if (null === $message) {
            $msg = $GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][$code];
        } else {
            $msg = $message;
        }

        $response = new JsonResponse(
            [
                'Errorcode'    => $code,
                'Errormessage' => $msg,
            ]
        );

        $response->send();
        exit;
    }


    abstract public function run();
}
