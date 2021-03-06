<?php

require_once 'Expected.class.php';

/**
 * Class globalConstants
 *
 * @author   Mario Henmanuel Vargas Ugalde <hemma.hvu@gmail.com>
 */
class GlobalConstants extends Expected
{
    const ExpMethodGet = 'GET';
    const ExpMethodPut = 'PUT';
    const ExpMethodPost = 'POST';
    const ExpMethodDelete = 'DELETE';

    const CallbackKey = 'callback';

    const ExpAvailableMethods = [
        self::ExpMethodGet,
        self::ExpMethodPut,
        self::ExpMethodPost,
        self::ExpMethodDelete
    ];

    const ContentTypesAllows = [
        self::ExpContentTypeAll,
        self::ExpContentTypeTextHTML,
        self::ExpContentTypeApplicationJSON
    ];

    const TranslatedRequestRoutes = [
        self::ExpTranslatedRequestStartupRoute => [
            self::ExpTranslatePublicRoute => true,
            self::ExpTranslateParamsMethodWithRoutes => false,
            self::ExpTranslateRouteType => self::ExpRouteRequest,
        ],

        self::ExpTranslateRequestRoutesRoute => [
            self::ExpTranslatePublicRoute => false,
            self::ExpTranslateParamsMethodWithRoutes => true,
            self::ExpTranslateRouteType => self::ExpRouteRequest
        ]
    ];

    const CacheSecretKey = 'SECRET_KEY';
    const CacheConfigDB = 'CONFIG_DB';
    const StepCheckSecretKey = 'checkSecretKey';
    const StepCheckAccessSystemDB = 'checkAccessSystemDB';
    const StepCheckConnexionHostDB = 'checkConnexionHostDB';
	
    const AllowHeaders = [
        self::ExpHeaderFrom,
        self::ExpHeaderAuth,
        self::ExpHeaderAccept
    ];

    const DirectoriesToIgnore = [
        'vendor',
        'staticFiles'
    ];

    const UrlRouteNotAllow = [
        self::ExpRouteError,
        self::ExpRouteRequest
    ];

    const RouteTypes = [
        self::ExpRouteView,
        self::ExpRouteRequest
    ];

    const BodyFieldsFormatAccepts = [
        self::ExpFormatInt,
        self::ExpFormatChar,
        self::ExpFormatDate,
        self::ExpFormatBool,
        self::ExpFormatEmail,
        self::ExpFormatFloat,
        self::ExpFormatDomain,
        self::ExpFormatVarchar,
        self::ExpFormatNumeric,
        self::ExpFormatRouteTypes
    ];

    const DBEngineMysql = 'mysql';
}