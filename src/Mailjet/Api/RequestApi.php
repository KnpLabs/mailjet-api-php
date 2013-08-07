<?php

namespace Mailjet\Api;

final class RequestApi
{
    /**
     * Functions for Api methods
     * @link http://www.mailjet.com/docs/api/api
     */

    /**
     * @link http://www.mailjet.com/docs/api/api/keyadd
     */
    const API_KEY_ADD = 'apiKeyadd';

    /**
     * @link http://www.mailjet.com/docs/api/api/keyauthenticate
     */
    const API_KEY_AUTH = 'apiKeyauthenticate';

    /**
     * @link http://www.mailjet.com/docs/api/api/keylist
     */
    const API_KEY_LIST = 'apiKeylist';

    /**
     * @link http://www.mailjet.com/docs/api/api/keysecret
     */
    const API_KEY_SECRET = 'apiKeysecret';

    /**
     * @link http://www.mailjet.com/docs/api/api/keysecretchange
     */
    const API_KEY_SECRET_CHANGE = 'apiKeysecretchange';

    /**
     * @link http://www.mailjet.com/docs/api/api/keyupdate
     */
    const API_KEY_UPDATE = 'apiKeyupdate';

    /**
     * Functions for User methods
     * @link http://www.mailjet.com/docs/api/user
     */

    /**
     * @link http://www.mailjet.com/docs/api/user/domainadd
     */
    const USER_DOMAIN_ADD = 'userDomainadd';

    /**
     * @link http://www.mailjet.com/docs/api/user/domainlist
     */
    const USER_DOMAIN_LIST = 'userDomainlist';

    /**
     * @link http://www.mailjet.com/docs/api/user/domainstatus
     */
    const USER_DOMAIN_STATUS = 'userDomainstatus';

    /**
     * @link http://www.mailjet.com/docs/api/user/infos
     */
    const USER_INFOS = 'userInfos';

    /**
     * @link http://www.mailjet.com/docs/api/user/senderadd
     */
    const USER_SENDER_ADD = 'userSenderadd';

    /**
     * @link http://www.mailjet.com/docs/api/user/senderlist
     */
    const USER_SENDER_LIST = 'userSenderlist';

    /**
     * @link http://www.mailjet.com/docs/api/user/senderstatus
     */
    const USER_SENDER_STATUS = 'userSenderstatus';

    /**
     * @link http://www.mailjet.com/docs/api/user/trackingcheck
     */
    const USER_TRACKING_CHECK = 'userTrackingcheck';

    /**
     * @link http://www.mailjet.com/docs/api/user/trackingupdate
     */
    const USER_TRACKING_UPDATE = 'userTrackingupdate';

    /**
     * @link http://www.mailjet.com/docs/api/user/update
     */
    const USER_UPDATE = 'userUpdate';

    /**
     * Functions for Message methods
     * @link http://www.mailjet.com/docs/api/message
     */

    /**
     * @link http://www.mailjet.com/docs/api/message/campaigns
     */
    const MESSAGE_CAMPAIGNS = 'messageCampaigns';

    /**
     * @link http://www.mailjet.com/docs/api/message/contacts
     */
    const MESSAGE_CONTACTS = 'messageContacts';

    /**
     * @link http://www.mailjet.com/docs/api/message/createcampaign
     */
    const MESSAGE_CREATE_CAMPAIGN = 'messageCreatecampaign';

    /**
     * @link http://www.mailjet.com/docs/api/message/duplicatecampaign
     */
    const MESSAGE_DUPLICATE_CAMPAIGN = 'messageDuplicatecampaign';

    /**
     * @link http://www.mailjet.com/docs/api/message/htmlcampaign
     */
    const MESSAGE_HTML_CAMPAIGN = 'messageHtmlcampaign';

    /**
     * @link http://www.mailjet.com/docs/api/message/list
     */
    const MESSAGE_LIST = 'messageList';

    /**
     * @link http://www.mailjet.com/docs/api/message/sendcampaign
     */
    const MESSAGE_SEND_CAMPAIGN = 'messageSendcampaign';

    /**
     * @link http://www.mailjet.com/docs/api/message/sethtmlcampaign
     */
    const MESSAGE_SET_HTML_CAMPAIGN = 'messageSethtmlcampaign';

    /**
     * @link http://www.mailjet.com/docs/api/message/statistics
     */
    const MESSAGE_STATISTICS = 'messageStatistics';

    /**
     * @link http://www.mailjet.com/docs/api/message/testcampaign
     */
    const MESSAGE_TEST_CAMPAIGN = 'messageTestcampaign';

    /**
     * @link http://www.mailjet.com/docs/api/message/tplcategories
     */
    const MESSAGE_TPL_CATEGORIES = 'messageTplcategories';

    /**
     * @link http://www.mailjet.com/docs/api/message/tplmodels
     */
    const MESSAGE_TPL_MODELS = 'messageTplmodels';

    /**
     * @link http://www.mailjet.com/docs/api/message/updatecampaign
     */
    const MESSAGE_UPDATE_CAMPAIGN = 'messageUpdatecampaign';

    /**
     * Functions for Contact methods
     * @link http://www.mailjet.com/docs/api/contact
     */

    /**
     * @link http://www.mailjet.com/docs/api/contact/infos
     */
    const CONTACT_INFOS = 'contactInfos';

    /**
     * @link http://www.mailjet.com/docs/api/contact/list
     */
    const CONTACT_LIST = 'contactList';

    /**
     * @link http://www.mailjet.com/docs/api/contact/openers
     */
    const CONTACT_OPENERS = 'contactOpeners';

    /**
     * Functions for Lists methods
     * @link http://www.mailjet.com/docs/api/lists
     */

    /**
     * @link http://www.mailjet.com/docs/api/lists/addcontact
     */
    const LISTS_ADD_CONTACT = 'listsAddcontact';

    /**
     * @link http://www.mailjet.com/docs/api/lists/addmanycontacts
     */
    const LISTS_ADD_MANY_CONTACTS = 'listsAddmanycontacts';

    /**
     * @link http://www.mailjet.com/docs/api/lists/all
     */
    const LISTS_ALL = 'listsAll';

    /**
     * @link http://www.mailjet.com/docs/api/lists/contacts
     */
    const LISTS_CONTACTS = 'listsContacts';

    /**
     * @link http://www.mailjet.com/docs/api/lists/create
     */
    const LISTS_CREATE = 'listsCreate';

    /**
     * @link http://www.mailjet.com/docs/api/lists/update
     */
    const LISTS_UPDATE = 'listsUpdate';

    /**
     * @link http://www.mailjet.com/docs/api/lists/delete
     */
    const LISTS_DELETE = 'listsDelete';

    /**
     * @link http://www.mailjet.com/docs/api/lists/email
     */
    const LISTS_EMAIL = 'listsEmail';

    /**
     * @link http://www.mailjet.com/docs/api/lists/removecontact
     */
    const LISTS_REMOVE_CONTACT = 'listsRemovecontact';

    /**
     * @link http://www.mailjet.com/docs/api/lists/removemanycontacts
     */
    const LISTS_REMOVE_MANY_CONTACTS = 'listsRemovemanycontacts';

    /**
     * @link http://www.mailjet.com/docs/api/lists/statistics
     */
    const LISTS_STATISTICS = 'listsStatistics';

    /**
     * @link http://www.mailjet.com/docs/api/lists/unsubcontact
     */
    const LISTS_UNSUB_CONTACT = 'listsUnsubcontact';

    /**
     * Functions for Report methods
     * @link http://www.mailjet.com/docs/api/report
     */

    /**
     * @link http://www.mailjet.com/docs/api/report/click
     */
    const REPORT_CLICK = 'reportClick';

    /**
     * @link http://www.mailjet.com/docs/api/report/domain
     */
    const REPORT_DOMAIN = 'reportDomain';

    /**
     * @link http://www.mailjet.com/docs/api/report/emailbounce
     */
    const REPORT_EMAIL_BOUNCE = 'reportEmailbounce';

    /**
     * @link http://www.mailjet.com/docs/api/report/emailclients
     */
    const REPORT_EMAIL_CLIENTS = 'reportEmailclients';

    /**
     * @link http://www.mailjet.com/docs/api/report/emailinfos
     */
    const REPORT_EMAIL_INFOS = 'reportEmailinfos';

    /**
     * @link http://www.mailjet.com/docs/api/report/emailsent
     */
    const REPORT_EMAIL_SENT = 'reportEmailsent';

    /**
     * @link http://www.mailjet.com/docs/api/report/emailstatistics
     */
    const REPORT_EMAIL_STATISTICS = 'reportEmailstatistics';

    /**
     * @link http://www.mailjet.com/docs/api/report/geoip
     */
    const REPORT_GEO_IP = 'reportGeoip';

    /**
     * @link http://www.mailjet.com/docs/api/report/open
     */
    const REPORT_OPEN = 'reportOpen';

    /**
     * @link http://www.mailjet.com/docs/api/report/openedstatistics
     */
    const REPORT_OPENED_STATISTICS = 'reportOpenedstatistics';

    /**
     * @link http://www.mailjet.com/docs/api/report/useragents
     */
    const REPORT_USER_AGENTS = 'reportUseragents';

    /**
     * Functions for Help methods
     * @link http://www.mailjet.com/docs/api/Help
     */

    /**
     * @link http://www.mailjet.com/docs/api/Help/categories
     */
    const HELP_CATEGORIES = 'HelpCategories';

    /**
     * @link http://www.mailjet.com/docs/api/Help/category
     */
    const HELP_CATEGORY = 'HelpCategory';

    /**
     * @link http://www.mailjet.com/docs/api/Help/method
     */
    const HELP_METHOD = 'HelpMethod';

    /**
     * @link http://www.mailjet.com/docs/api/Help/methods
     */
    const HELP_METHODS = 'HelpMethods';

    /**
     * @link http://www.mailjet.com/docs/api/Help/status
     */
    const HELP_STATUS = 'HelpStatus';

    public static function isGet($apiQuery)
    {
        return in_array($apiQuery, array(
            self::API_KEY_LIST,
            self::API_KEY_SECRET,
            self::API_KEY_SECRET_CHANGE,

            self::USER_DOMAIN_LIST,
            self::USER_INFOS,
            self::USER_SENDER_LIST,
            self::USER_TRACKING_CHECK,

            self::MESSAGE_CAMPAIGNS,
            self::MESSAGE_CONTACTS,
            self::MESSAGE_HTML_CAMPAIGN,
            self::MESSAGE_LIST,
            self::MESSAGE_STATISTICS,
            self::MESSAGE_TPL_CATEGORIES,
            self::MESSAGE_TPL_MODELS,

            self::CONTACT_INFOS,
            self::CONTACT_LIST,
            self::CONTACT_OPENERS,

            self::LISTS_ALL,
            self::LISTS_CONTACTS,
            self::LISTS_EMAIL,
            self::LISTS_STATISTICS,

            self::REPORT_CLICK,
            self::REPORT_DOMAIN,
            self::REPORT_EMAIL_BOUNCE,
            self::REPORT_EMAIL_CLIENTS,
            self::REPORT_EMAIL_INFOS,
            self::REPORT_EMAIL_SENT,
            self::REPORT_EMAIL_STATISTICS,
            self::REPORT_GEO_IP,
            self::REPORT_OPEN,
            self::REPORT_OPENED_STATISTICS,
            self::REPORT_USER_AGENTS,

            self::HELP_CATEGORIES,
            self::HELP_CATEGORY,
            self::HELP_METHOD,
            self::HELP_METHODS,
            self::HELP_STATUS
        ));
    }

    public static function isPost($apiQuery)
    {
        return in_array($apiQuery, array(
            self::API_KEY_ADD,
            self::API_KEY_AUTH,
            self::API_KEY_UPDATE,

            self::USER_DOMAIN_ADD,
            self::USER_SENDER_ADD,
            self::USER_SENDER_STATUS,
            self::USER_TRACKING_UPDATE,
            self::USER_UPDATE,

            self::MESSAGE_CREATE_CAMPAIGN,
            self::MESSAGE_DUPLICATE_CAMPAIGN,
            self::MESSAGE_SEND_CAMPAIGN,
            self::MESSAGE_SET_HTML_CAMPAIGN,
            self::MESSAGE_TEST_CAMPAIGN,
            self::MESSAGE_UPDATE_CAMPAIGN,

            self::LISTS_ADD_CONTACT,
            self::LISTS_ADD_MANY_CONTACTS,
            self::LISTS_CREATE,
            self::LISTS_UPDATE,
            self::LISTS_DELETE,
            self::LISTS_REMOVE_CONTACT,
            self::LISTS_REMOVE_MANY_CONTACTS
        ));
    }

    private function __construct() {}
}
