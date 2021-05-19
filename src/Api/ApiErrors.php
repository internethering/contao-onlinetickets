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

namespace Internethering\Isotope\OnlineTickets\Api;


final class ApiErrors
{

    /**
     * "Unbekanntes Terminal"
     * Standard-Fehler, auch bspw. bei falschen Zugangsdaten bzw. falschem Token
     */
    const UNKNOWN_TERMINAL = 1;

    /**
     * "Ticket nicht gefunden"
     */
    const TICKET_NOT_FOUND = 4;

    /**
     * "Keine Veranstaltungen mit aktiven Ticktes gefunden"
     */
    const NO_EVENTS = 6;
}
