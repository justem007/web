<?php

/**
 *
 * @author     Darko Goleš <ricardojustem@gmail.com>
 * @package    Inchoo
 * @subpackage RestConnect
 *
 * Url of controller is: http://mage.dev/restconnect/test/[action]
 */
class RicardoJustem_RicardoModel_TestController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {

        //Basic parameters that need to be provided for oAuth authentication
        //on Magento
        $params = array(
            'siteUrl' => 'http://mage.dev/oauth',
            'requestTokenUrl' => 'http://mage.dev/oauth/initiate',
            'accessTokenUrl' => 'http://mage.dev/oauth/token',
            'authorizeUrl' => 'http://mage.dev/admin/oAuth_authorize', //This URL is used only if we authenticate as Admin user type
            'consumerKey' => 'bfb01bad9323bba5adcb9df523c38144', //Consumer key registered in server administration
            'consumerSecret' => '2e9112884e3fca2a761dcfb41591b1f1', //Consumer secret registered in server administration
            'callbackUrl' => 'http://mage.dev/restconnect/test/callback', //Url of callback action below
        );

        $oAuthClient = Mage::getModel('ricardojustem_ricardomodel/oauth_client');
        $oAuthClient->reset();

        $oAuthClient->init($params);
        $oAuthClient->authenticate();

        return;
    }

    public function callbackAction() {

        $oAuthClient = Mage::getModel('ricardojustem_ricardomodel/oauth_client');
        $params = $oAuthClient->getConfigFromSession();
        $oAuthClient->init($params);

        $state = $oAuthClient->authenticate();

        if ($state == RicardoJustem_RicardoModel_Oauth_Client::OAUTH_STATE_ACCESS_TOKEN) {
            $acessToken = $oAuthClient->getAuthorizedToken();
        }

        $restClient = $acessToken->getHttpClient($params);
        // Set REST resource URL
        $restClient->setUri('http://mage.dev/api/rest/products');
        // In Magento it is neccesary to set json or xml headers in order to work
        $restClient->setHeaders('Accept', 'application/json');
        // Get method
        $restClient->setMethod(Zend_Http_Client::GET);
        //Make REST request
        $response = $restClient->request();
        // Here we can see that response body contains json list of products
        Zend_Debug::dump($response);

        return;
    }

}