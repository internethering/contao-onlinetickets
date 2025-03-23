<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * Copyright (c) 2016-2017 Richard Hering
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Hering
 * @copyright 2016-2017 Richard Henkenjohann, 2020-2025 Richard Hering
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */


namespace Internethering\OnlineTickets\Controller;

use Internethering\OnlineTickets\Security\JWTCoder;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Internethering\OnlineTickets\Helper\Statuscodes;
use Symfony\Component\Routing\Annotation\Route;

use Internethering\OnlineTickets\Model\Agency;
use Internethering\OnlineTickets\Model\Order;
use Internethering\OnlineTickets\Model\Ticket;

use Contao\Input;

/**
 * Authentication
 *
 * @Route("/api/onlinetickets", defaults={"_format": "json", "_token_check" = false})
 */
class ApiController extends AbstractController
{
    /**
     * @param string $entity
     * @return string
     */
    private function getToken(string $entity): string
    {
        $tokenData = [
            'entity' => $entity,
        ];

        if (method_exists($this->getUser(), 'getUserIdentifier')) {
            $tokenData['username'] = $this->getUser()->getUserIdentifier();
        } else {
            $tokenData['username'] = $this->getUser()->getUsername();
        }

        return $this->jwtCoder->encode($tokenData);
    }

    /**
     * @required
     */
    public function setJWTCoder(JWTCoder $jwtCoder)
    {
        $this->jwtCoder = $jwtCoder;
    }
    /**
     * @required
     */
    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * login Action
     *
     * @Route("/login", name="onlinetickets_api_login", defaults={"_scope"="onlinetickets_api_login"})
     */
    public function loginAction(Request $request): Response
    {
        return new JsonResponse(['token' => $this->getToken('internethering.onlinetickets.entity.user')]);
    }

    /**
     * all Orders
     *
     * @Route("/checkIn", name="onlinetickets_api_checkin", defaults={"_scope"="onlinetickets_api_action"})
     */
    public function checkInAction(Request $request): Response
    {
        if (null !== ($locale = $request->getPreferredLanguage())) {
            $this->translator->setLocale($locale);
        }

        $ticketcode = Input::get('ticketcode');
        $ticket = Ticket::findByTicketCode($ticketcode);
//        return new JsonResponse(['ticketcode' => $ticketcode]);

        // Exit if ticket not found
        if (null === $ticket) {
            return new JsonResponse(['message' => $this->translator->trans('internethering.onlinetickets.exception.ticket.not_found', ['%ticketcode%' => $ticketcode])], Statuscodes::TICKET_NOT_FOUND);
        }

        return new JsonResponse(['message' => $this->translator->trans('internethering.onlinetickets.exception.ticket.not_implemented')], Response::HTTP_NOT_IMPLEMENTED);
//        $success = false;
//
//        if ($this->user->tickets_defineMode) {
//            $ticket->agency_id = $this->user->tickets_defineModeAgencyId;
//            $ticket->save();
//        } else {
//            // Check if check in possible and user is not in test mode
//            if ($ticket->checkInPossible() && !$this->user->tickets_testmode) {
//                $ticket->checkin      = time();
//                $ticket->checkin_user = $this->user->id;
//
//                if ($ticket->save()) {
//                    $success = true;
//                }
//            }
//        }
//
//        $response = new JsonResponse(
//            [
//                'Checkin' => [
//                    'Result' => $success,
//                ],
//            ]
//        );
//
//        $response->send();
    }
}
