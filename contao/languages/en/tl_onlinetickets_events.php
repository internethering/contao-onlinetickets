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


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['title_legend']      = 'Title and settings';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['preprinted_legend'] = 'Pre-printed tickets';


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['name'][0]                  = 'Name';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['name'][1]                  = 'Enter the name of the event here.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['users'][0]                 = 'User';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['users'][1]                 = 'Select the users who can access the event via the API here.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['date'][0]                  = 'Date';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['date'][1]                  = 'Enter the date of the event here.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_price'][0]          = 'Ticket price';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_price'][1]          = 'Enter the price of the ticket that is generally valid for this event here.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['preprinted_tickets'][0]    = 'Pre-printed tickets';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['preprinted_tickets'][1]    = 'Select this checkbox to create PDF printouts for pre-printed tickets.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_width'][0]          = 'Width';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_width'][1]          = 'Enter the width of the tickets.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_height'][0]         = 'Height';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_height'][1]         = 'Enter the height of the tickets.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_elements'][0]       = 'Elements for printout';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_elements'][1]       = 'Enter the elements you want to appear on the printout row by row.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['te_element'][0]            = 'Element';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['te_position_x'][0]         = 'Position horizontal';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['te_position_x'][1]         = 'Specify the horizontal position of the element on the page of the printout for this element. Enter 0 to bypass the margin. The unit used is the one shown above.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['te_position_y'][0]         = 'Position vertical';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['te_position_y'][1]         = 'Specify the vertical position of the element on the page of the printout for this element. Enter 0 to bypass the margin. The unit used is the one shown above.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_font_family'][0]    = 'Font family';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_font_family'][1]    = 'Select the font family.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_font_style'][0]     = 'Font style';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_font_style'][1]     = 'Select one or more font styles.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_font_size'][0]      = 'Font size';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_font_size'][1]      = 'Enter the font size.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_fill_number'][0]    = 'Fill in ticket number';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_fill_number'][1]    = 'If required, enter the number of digits to which the ticket number is to be filled with zeros.';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_barcode_height'][0] = 'Barcode height';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_barcode_height'][1] = 'Enter the height of the barcode if required.';


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['te_element_values'] = [
    'id'   => 'Ticketnummer',
    'name' => 'Name',
    'date' => 'Datum',
    'C128' => 'Barcode Typ 128',
    'C39'  => 'Barcode Typ 3 of 9'
];

$GLOBALS['TL_LANG']['tl_onlinetickets_events']['ticket_font_style_values'] = [
    'B' => 'fett',
    'I' => 'kursiv',
    'U' => 'unterstrichen',
    'D' => 'durchgestrichen',
    'O' => 'überstrichen'
];


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['new'][0]      = 'Neues Event';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['new'][1]      = 'Ein neues Event anlegen';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['edit'][0]     = 'Event bearbeiten';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['edit'][1]     = 'Event ID %u bearbeiten';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['copy'][0]     = 'Event duplizieren';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['copy'][1]     = 'Event ID %u duplizieren';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['delete'][0]   = 'Event löschen';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['delete'][1]   = 'Event ID %u löschen';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['show'][0]     = 'Eventdetails';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['show'][1]     = 'Details des Events ID %u anzeigen';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['agencies'][0] = 'Vorverkaufsstellen';
$GLOBALS['TL_LANG']['tl_onlinetickets_events']['agencies'][1] = 'Die Vorverkaufsstellen für das Event ID %u bearbeiten';
