<?php

namespace Mailjet\Event\Data;

final class EventData
{
    const EVENT_OPEN    = 'open';
    const EVENT_CLICK   = 'click';
    const EVENT_BOUNCE  = 'bounce';
    const EVENT_SPAM    = 'spam';
    const EVENT_BLOCKED = 'blocked';
    const EVENT_UNSUB   = 'unsub';
    const EVENT_TYPOFIX = 'typofix';

    const DATA_TIME             = 'time';
    const DATA_EVENT            = 'event';
    const DATA_EMAIL            = 'email';
    const DATA_CAMPAIGN_ID      = 'mj_campaign_id';
    const DATA_CONTACT_ID       = 'mj_contact_id';
    const DATA_CUSTOM_CAMPAIGN  = 'customcampaign';
    const DATA_IP               = 'ip';
    const DATA_GEO              = 'geo';
    const DATA_USER_AGENT       = 'agent';
    const DATA_URL              = 'url';
    const DATA_BLOCKED          = 'blocked';
    const DATA_ERROR            = 'error';
    const DATA_HARD_BOUNCE      = 'hard_bounce';
    const DATA_ERROR_RELATED_TO = 'error_related_to';
    const DATA_SOURCE           = 'source';
    const DATA_LIST_ID          = 'mj_list_id';
    const DATA_ORIGINAL_ADDRESS = 'original_address';
    const DATA_NEW_ADDRESS      = 'new_address';

    private function __construct() {}
}
