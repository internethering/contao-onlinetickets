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


use Contao\UserModel;
use Isotope\Model\Product;
use Isotope\Model\ProductCollection\Order;
use Isotope\Model\ProductCollectionItem;
use Internethering\OnlineTickets\Model\Agency;
use Internethering\OnlineTickets\Model\Event;
use Internethering\OnlineTickets\Model\Ticket;

$table = Ticket::getTable();


/**
 * Table tl_onlinetickets_tickets
 */
$GLOBALS['TL_DCA'][$table] = [

    // Config
    'config' => [
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ],
        ],
    ],

    // Fields
    'fields' => [
        'id'           => [
            'label' => &$GLOBALS['TL_LANG'][$table]['id'],
            'sql'   => "int(10) unsigned NOT NULL auto_increment",
        ],
        'tstamp'       => [
            'label' => &$GLOBALS['TL_LANG'][$table]['tstamp'],
            'sql'   => "int(10) unsigned NOT NULL default '0'",
        ],
        'event_id'     => [
            'label'    => &$GLOBALS['TL_LANG'][$table]['event_id'],
            'sql'      => "int(10) unsigned NOT NULL default '0'",
            'relation' => [
                'type'  => 'belongsTo',
                'load'  => 'lazy',
                'table' => Event::getTable(),
            ],
        ],
        'product_id'   => [
            'label'    => &$GLOBALS['TL_LANG'][$table]['product_id'],
            'sql'      => "int(10) unsigned NOT NULL default '0'",
            'relation' => [
                'type'  => 'belongsTo',
                'load'  => 'lazy',
                'table' => Product::getTable(),
            ],
        ],
        'order_id'     => [
            'label'    => &$GLOBALS['TL_LANG'][$table]['order_id'],
            'sql'      => "int(10) unsigned NOT NULL default '0'",
            'relation' => [
                'type'  => 'belongsTo',
                'load'  => 'lazy',
                'table' => Order::getTable(),
            ],
        ],
        'item_id'      => [
            'label'    => &$GLOBALS['TL_LANG'][$table]['item_id'],
            'sql'      => "int(10) unsigned NOT NULL default '0'",
            'relation' => [
                'type'  => 'belongsTo',
                'load'  => 'lazy',
                'table' => ProductCollectionItem::getTable(),
            ],
        ],
        'agency_id'    => [
            'label'    => &$GLOBALS['TL_LANG'][$table]['agency_id'],
            'sql'      => "int(10) unsigned NOT NULL default '0'",
            'relation' => [
                'type'  => 'belongsTo',
                'load'  => 'lazy',
                'table' => Agency::getTable(),
            ],
        ],
        'hash'         => [
            'label' => &$GLOBALS['TL_LANG'][$table]['hash'],
            'sql'   => "varchar(32) NOT NULL default ''",
        ],
        'checkin'      => [
            'label' => &$GLOBALS['TL_LANG'][$table]['checkin'],
            'sql'   => "int(10) unsigned NOT NULL default '0'",
        ],
        'checkin_user' => [
            'label'    => &$GLOBALS['TL_LANG'][$table]['checkin_user'],
            'sql'      => "int(10) unsigned NOT NULL default '0'",
            'relation' => [
                'type'  => 'belongsTo',
                'load'  => 'lazy',
                'table' => UserModel::getTable(),
            ],
        ],
    ],
];
