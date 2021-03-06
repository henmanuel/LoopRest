<?php

/**
 * Class RequestRoute
 *
 * @author   Mario Henmanuel Vargas Ugalde <hemma.hvu@gmail.com>
 */
class RequestRoute extends Expected
{
	/**
	 * Set in expected the constant to name to params
	 *
	 * @var array
	 */
	public static $routes = [
		//REQUEST Action
		self::ExpRouteRequest => [
			self::ExpRouteMethod => [
				self::ExpRouteMethod => self::ExpFormatVarchar
			],
			self::ExpRouteKeyTrigger => self::ExpRequestTrigger,
			self::ExpRouteNeedTK => true,
			self::ExpFriendlyURL => true
		],

		//VIEWS Action
		self::ExpRouteView => [
			self::ExpRouteKeyParams => [
				self::ExpView => self::ExpFormatVarchar
			],
			self::ExpRouteKeyTrigger => self::ExpViewTrigger,
			self::ExpRouteNeedTK => false,
			self::ExpFriendlyURL => false
		],

		//AUTH action
		self::ExpRouteAuth => [
			self::ExpRouteKeyParams => [
				self::ExpAuthId => self::ExpFormatNumeric,
				self::ExpAuthEmail => self::ExpFormatEmail,
				self::ExpAuthName => self::ExpFormatChar,
				self::ExpAuthBirthday => self::ExpFormatDate
			],
			self::ExpRouteKeyTrigger => self::ExpAuthTrigger,
			self::ExpRouteNeedTK => false,
			self::ExpFriendlyURL => false
		],

		//ERROR Action
		self::ExpRouteError => [
			self::ExpRouteKeyParams => [
				self::ExpErrorCode => self::ExpFormatNumeric,
				self::ExpErrorDesc => self::ExpFormatVarchar
			],
			self::ExpErrorKeyException => [
				self::ExpErrorLine => self::ExpFormatDate,
				self::ExpErrorDoc => self::ExpFormatChar
			],
			self::ExpRouteKeyTrigger => self::ExpErrorTrigger,
			self::ExpRouteNeedTK => false,
			self::ExpFriendlyURL => false
		],

		//ROUTES Action
		self::ExpRouteRoutes => [
			self::ExpRouteKeyParams => [
				self::ExpRoutes => self::ExpFormatVarchar
			],
			self::ExpRouteKeyTrigger => self::ExpRoutesTrigger,
			self::ExpRouteNeedTK => true,
			self::ExpFriendlyURL => false
		]
	];
}