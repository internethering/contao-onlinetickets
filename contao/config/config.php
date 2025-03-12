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

use Internethering\Isotope\OnlineTickets\Helper\Checkout;
use Internethering\Isotope\OnlineTickets\Helper\DataHandling;
use Internethering\Isotope\OnlineTickets\Model\Agency;
use Internethering\Isotope\OnlineTickets\Model\Event;
use Internethering\Isotope\OnlineTickets\Model\Ticket;
use Internethering\Isotope\OnlineTickets\Module\BoxOffice;


/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['isotope']['onlinetickets_events'] = [
    'tables'     => [Event::getTable(), Agency::getTable()],
    'icon'       => 'system/modules/calendar/assets/icon.gif',
    'report'     => [DataHandling::class, 'exportEventReport'],
    'export'     => [DataHandling::class, 'exportAgencyBarcodes'],
    'export_pdf' => [DataHandling::class, 'exportPreprintedTicketsPdf'],
];


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['application']['boxoffice'] = BoxOffice::class;


/**
 * Models
 */
$GLOBALS['TL_MODELS'][Event::getTable()]  = Event::class;
$GLOBALS['TL_MODELS'][Ticket::getTable()] = Ticket::class;
$GLOBALS['TL_MODELS'][Agency::getTable()] = Agency::class;


/**
 * Hooks
 */
$GLOBALS['ISO_HOOKS']['preCheckout'][]  = [Checkout::class, 'setTicketsInDatabase'];
$GLOBALS['ISO_HOOKS']['postCheckout'][] = [Checkout::class, 'activateTicketsInDatabase'];
