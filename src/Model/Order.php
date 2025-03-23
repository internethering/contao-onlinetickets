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


namespace Internethering\OnlineTickets\Model;


/**
 * Class Order
 *
 * @package Internethering\OnlineTickets\Model
 */
class Order
{

    /**
     * Get a particular attribute
     * The key id is deceptive and disabled therefore
     *
     * @param string $key
     *
     * @return mixed
     * @throws \Exception
     */
    public function __get($key)
    {
        if ('id' === $key) {
            throw new \Exception('Key "id" can not be used. Use key "order_id" instead.');
        }

        return static::__get($key);
    }


    /**
     * Get all orders by a referenced member
     * It's a Ticket model call with orders grouped
     *
     * @param integer $memberId
     *
     * @return \Model\Collection|null|Ticket
     */
    public static function findByUser($memberId)
    {
        return Ticket::findByUser(
            $memberId,
            [
                'column' => [
                    'agency_id=0'
                ],
                'group'  => 'order_id'
            ]
        );
    }
}
