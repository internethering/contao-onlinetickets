<?php

namespace Internethering\OnlineTickets\Helper;

class Statuscodes
{
    public const TICKET_VALIDATED = 260;
    public const TICKET_NOT_PAID = 460;
    public const TICKET_NOT_PAID_AND_TO_EARLY = 461;
    public const TICKET_TO_EARLY = 462;
    public const TICKET_INVALIDATE = 463;
    public const TICKET_CANCELED = 464;
    public const TICKET_NOT_FOUND = 465;
}