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


namespace Internethering\Isotope\OnlineTickets\Api\Action;

use Internethering\Isotope\OnlineTickets\Api\AbstractApi;
use Internethering\Isotope\OnlineTickets\Model\Agency;
use Internethering\Isotope\OnlineTickets\Model\Order;
use Internethering\Isotope\OnlineTickets\Model\Ticket;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class GetOrdersByToken
 *
 * @package Internethering\Isotope\OnlineTickets\Api\Action
 */
class GetOrdersByToken extends AbstractApi
{

    /**
     * Output all member assigned orders
     */
    public function run()
    {
        $this->authenticateToken();

        $return = [];
        $orders = Order::findByUser($this->user->id);

        if (null !== $orders) {
            while ($orders->next()) {
                // Do not include if order is older than submitted timestamp
                if ($this->getParameter('timestamp') > 1 && $orders->tstamp < $this->getParameter('timestamp')) {
                    continue;
                }

                $address      = $orders->current()->getAddress();
                $isotopeOrder = $orders->getRelated('order_id');
                if (null === $isotopeOrder) {
                    continue;
                }

                $status  = $isotopeOrder->getRelated('order_status');
                $tickets = Ticket::findByOrder($orders->order_id);

                $order = [
                    'OrderId'          => (int) $orders->order_id,
                    'CustomerName'     => sprintf('%s %s', $address->firstname, $address->lastname),
                    'TicketsCount'     => $tickets->count(),
                    'TicketsCheckedIn' => Ticket::countBy(['order_id=?', 'checkin<>0'], [$orders->order_id]),
                    'OrderStatus'      => (null !== $status) ? $status->name : '',
                    // ['approved', 'invited', 'chargeback']
                    'EventId'          => (int) $orders->event_id,
                    'OrderTickets'     => array_map('intval', array_values($tickets->fetchEach('id')))
                ];

                $return[] = $order;
            }
        }

        // Fetch agencies too
        $agencies = Agency::findByUser($this->user->id);

        if (null !== $agencies) {
            while ($agencies->next()) {
                // Do not include if agency is older than submitted timestamp
                if ($this->getParameter('timestamp') > 1 && $agencies->tstamp < $this->getParameter('timestamp')) {
                    continue;
                }

                $tickets = Ticket::findByAgency($agencies->id);
                if (null === $tickets) {
                    continue;
                }

                $order = [
                    'OrderId'          => -(int) $agencies->id, # prefix minus to differentiate from online orders
                    'CustomerName'     => $agencies->name,
                    'TicketsCount'     => $tickets->count(),
                    'TicketsCheckedIn' => Ticket::countBy(['agency_id=?', 'checkin<>0'], [$agencies->id]),
                    'OrderStatus'      => '',
                    'EventId'          => (int) $agencies->pid,
                    'OrderTickets'     => array_map('intval', array_values($tickets->fetchEach('id')))
                ];

                $return[] = $order;
            }
        }

        $response = new JsonResponse(
            [
                'Orders' => $return
            ]
        );

        $response->send();
    }
}
