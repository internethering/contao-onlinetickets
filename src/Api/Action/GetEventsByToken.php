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


namespace Internethering\OnlineTickets\Api\Action;

use Internethering\OnlineTickets\Api\AbstractApi;
use Internethering\OnlineTickets\Model\Event;
use Internethering\OnlineTickets\Model\Ticket;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class GetEventsByToken
 *
 * @package Internethering\OnlineTickets\Api\Action
 */
class GetEventsByToken extends AbstractApi
{

    /**
     * Output all member assigned events
     */
    public function run()
    {
        $this->authenticateToken();

        $events = Event::findByUser($this->user->id);
        $return = [];

        while ($events->next()) {
            $event = [
                'EventId'               => (int) $events->id,
                'EventName'             => $events->name,
                'EventDate'             => (int) $events->date,
                'CountSoldTickets'      => Ticket::countBy('event_id', $events->id),
                'CountCheckedInTickets' => Ticket::countBy(['event_id=?', 'checkin<>0'], [$events->id]),
            ];

            $return[] = $event;
        }

        $response = new JsonResponse(
            [
                'Events' => $return
            ]
        );

        $response->send();
    }
}
