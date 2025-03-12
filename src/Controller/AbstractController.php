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


namespace Internethering\Isotope\OnlineTickets\Controller;

use Contao\Controller;
use Contao\Input;
use Internethering\Isotope\OnlineTickets\Helper\ApiUser;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class AbstractApi
 *
 * @package Internethering\Isotope\OnlineTickets\Api
 */
class AbstractController
{

    /**
     * @var ApiUser
     */
    protected $user;

    /**
     * AbstractApi constructor.
     */
    public function __construct()
    {
//        Controller::loadLanguageFile('default');
//        $this->user = ApiUser::getInstance();
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
        $userHash = $this->getParameter('token');
        if (!$this->user->setHash($userHash)->authenticate()) {
            $this->exitWithError();
        }
    }

    /**
     * Exit with json formatted error message
     *
     * @param int $code The error code as defined in @see ApiErrors
     */
    protected function exitWithError($code = null)
    {
        if (null === $code) {
            $code = ApiErrors::UNKNOWN_TERMINAL;
        }

        $response = new JsonResponse(
            [
                'Errorcode'    => $code,
                'Errormessage' => $GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][$code],
            ]
        );

        $response->send();
        exit;
    }
}
