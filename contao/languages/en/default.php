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

use Internethering\Isotope\OnlineTickets\Api\ApiErrors;


/**
 * Errors
 */
$GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][ApiErrors::UNKNOWN_TERMINAL] = 'Unbekanntes Terminal';
$GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][ApiErrors::TICKET_NOT_FOUND] = 'Ticket nicht gefunden';
$GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][ApiErrors::NO_EVENTS]        = 'Keine Veranstaltungen mit aktiven Ticktes gefunden';
