<?php

require_once DIR . '/auth/Access.class.php';
require_once DIR . '/auth/Token.class.php';
require_once DIR . '/auth/WhiteList.class.php';

class Auth extends Access
{
    protected static function check($Token)
    {
        return Token::check($Token);
    }

    protected static function getData($Token, $request)
    {
        $user = Token::getData($Token);
        return $user;//$this->auth->search($request.'/'.$user->id,TRUE);
    }
    
    protected static function signIn($data)
    {
        return Token::signIn($data);
    }
    
    private function checkClient()
    {

    }

    private function checkAllowIp()
    {

    }

    private function checkAllowCountry()
    {

    }

    private function checkAllowClient()
    {

    }

    private function giveAccess()
    {

    }
    
    private function getCountryByIp()
    {

    }

    private function watchClient()
    {

    }

    private function banClient()
    {

    }

    private function washClient()
    {

    }
}