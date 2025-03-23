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

use Internethering\OnlineTickets\Api\ApiErrors;


/**
 * Errors
 */
$GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][ApiErrors::UNKNOWN_ERROR]    = 'unkown error';
$GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][ApiErrors::UNAUTHORIZED]     = 'Not authorized';
$GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][ApiErrors::UNKNOWN_TERMINAL] = 'unkown terminal';
$GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][ApiErrors::TICKET_NOT_FOUND] = 'ticket not found';
$GLOBALS['TL_LANG']['ERR']['onlinetickets_api'][ApiErrors::NO_EVENTS]        = 'No events with active tickets found';

/**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['tl_iso_producttype']['isTicket'] = 'is a ticket';
$GLOBALS['TL_LANG']['MSC']['onlinetickets_listview'] = '%s <span style="color:#b3b3b3;padding-left:3px">[%u tickets]</span>';
$GLOBALS['TL_LANG']['MSC']['ticketExportPdfTitle']   = 'tickets pre-sale office ID %u for %s';
$GLOBALS['TL_LANG']['MSC']['agencySaveConfirmation'] = '%2$u tickets have been created. There are now %3$u tickets for the pre-sale point “%1$s”.';
// Report
$GLOBALS['TL_LANG']['MSC']['ticket_report']     = 'pre-sale';
$GLOBALS['TL_LANG']['MSC']['ticket_price']      = 'Selling price';
$GLOBALS['TL_LANG']['MSC']['tickets_generated'] = 'Tickets generated';
$GLOBALS['TL_LANG']['MSC']['tickets_sold']      = 'Tickets sold';
$GLOBALS['TL_LANG']['MSC']['tickets_checkedin'] = 'Tickets admitted';
$GLOBALS['TL_LANG']['MSC']['tickets_sales']     = 'Revenue';
$GLOBALS['TL_LANG']['MSC']['total']             = 'Total';
// Box office
$GLOBALS['TL_LANG']['MSC']['boxoffice']['checkin']             = 'Admission date';
$GLOBALS['TL_LANG']['MSC']['boxoffice']['agency']              = 'Ticket office';
$GLOBALS['TL_LANG']['MSC']['boxoffice']['checkin_user']        = 'User';
$GLOBALS['TL_LANG']['MSC']['boxoffice']['undo']                = 'Undo checkin';
$GLOBALS['TL_LANG']['MSC']['boxoffice']['count_sold']          = 'Number of tickets sold';
$GLOBALS['TL_LANG']['MSC']['boxoffice']['count_checked_in']    = 'Number of tickets admitted';
$GLOBALS['TL_LANG']['MSC']['boxoffice']['count_check_in_left'] = 'Still to be granted admission';