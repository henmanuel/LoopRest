<?php

/**
 * Class Response
 */
class Response extends ModelsTracking
{
	private static $readyResponse = false;

	/**
	 * Response constructor.
	 * @param $response
	 */
	function __construct($response)
	{
	  $this->responseContentType();
		$model = Model::getInstance();
		$routeMD = $model->getRouteInstance;

    $route = $routeMD->getRoute();
		if($routeMD->getResponseObject()){
      $callback = $routeMD->getCallback();
      $responseObj = json_encode($response);
      $response = ($callback) ? "{$callback}({$responseObj});" : $responseObj;
    }else{

		  if($routeMD->getRoute() != GlobalSystem::ExpRouteView){
        $parentComponent = ucfirst($route);
        $view = CoreConfig::PRINCIPAL_VIEW . ':' . $parentComponent;
        $dataModel = [GlobalSystem::ExpRouteRequest => $response[$route]];

		    if($routeMD->getRoute() == GlobalSystem::ExpRouteError){
          $dataModel = [
            GlobalSystem::ExpRouteError => $parentComponent,
            GlobalSystem::ExpErrorCode => $response[$route][GlobalSystem::ExpErrorCode],
            GlobalSystem::ExpErrorDesc => $response[$route][GlobalSystem::ExpErrorDesc]
          ];
        }

        $request = [GlobalSystem::ExpRouteView => [GlobalSystem::ExpView => $view]];

        $routeMD->setRequest($request);
        $routeMD->setRoute(GlobalSystem::ExpRouteView);

        $views = new View();
        $response = $views->routingView($dataModel);
      }
    }

    echo($response);
    self::$readyResponse = true;
	}

  /**
   * Check type accept content type client
   */
	private function responseContentType()
  {
    $model = Model::getInstance();
    $routeMD = $model->getRouteInstance;
    $clientServerMD = $model->getClientServerInstance;

    $accept = $clientServerMD->getHeader(GlobalSystem::ExpHeaderAccept);
    $contentAccepting = explode(',', $accept);

    foreach($contentAccepting as $content => $type){
      if(in_array($type, GlobalSystem::ContentTypesAllows)){
        if($type == GlobalSystem::ExpContentTypeTextHTML){
          $routeMD->setResponseObject(false);
          break;
        }
      }
    }
  }

	/**
	 * Get if response its ready
	 *
	 * @return bool
	 */
	public static function getReadyResponse()
	{
		return self::$readyResponse;
	}

	/**
	 * Used to complete the steps of executing model tracking
	 *
	 * @see Model
	 * @see ModelsTracking
	 * @see StepsRoutes::$executionSteps
	 */
	public function __destruct()
	{
		Log::custom('ExecuteModels', json_encode(self::$executionSteps, JSON_PRETTY_PRINT));
	}
}