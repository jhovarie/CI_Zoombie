<?php

/**
 * Description of Facebook
 *
 * @author jhovarie.guiang
 */

class Facebook extends CI_Controller {

    private $_appid = 'your facebook app id';
    private $_secret = 'your facebook secret';
    
    public function __construct() {
        parent::__construct();
        require 'vendor/autoload.php';
        include_passkey(); 
        $this->_appid = get_facebook_appid();
        $this->_secret = get_facebook_secretkey();
    }

    function index() {
        $fb = new Facebook\Facebook([
            'app_id' => $this->_appid, // Replace {app-id} with your app id
            'app_secret' => 'd5e4826f606a84cd9b42edda1f809091',
            'default_graph_version' => 'v2.2',
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email']; // Optional permissions
//$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);
        $loginUrl = $helper->getLoginUrl('http://localhost/CI_Zoombie/facebook/fb_callback', $permissions);
        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
    }

    function fb_callback() {
        //$app_id = '584727691969584';
        //$app_secret = 'd5e4826f606a84cd9b42edda1f809091';

        $fb = new Facebook\Facebook([
            'app_id' => $this->_appid, // Replace {app-id} with your app id
            'app_secret' => $this->_secret,
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);
// Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId($this->_appid); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
                exit;
            }
        }

        $_SESSION['fb_access_token'] = (string) $accessToken;
        $fb->setDefaultAccessToken($_SESSION['fb_access_token']);
        $response = $fb->get('/me?locale=en_US&fields=name,email');
        $userNode = $response->getGraphUser();
        echo "ID = " . $userNode['id'];
        echo "<br/>Name = " . $userNode['name'];
        echo "<br/>Email = " . $userNode['email'];
    }

}
