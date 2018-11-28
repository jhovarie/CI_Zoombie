<?php
/**
 * Description of Paypal
 *
 * @author jhovarie.guiang
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal extends CI_Controller {

     //sandbox barik
    private $_clientid = "AV6eC1VsE-QMt-_wd3ib5V6efCyDMQH6VEKNL88tk7NcmfSkfqYEfzWuQf1L682MlinfRGoSmcm7_RM1";
    private $_secret = "EPDb4pNqzMvrc0jY7p2gAcToLlD0eop5Sddpt8HEbzZalhey96gwM8TFXs9Nr5mitFALtl5tEsdyU4yq";
    
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        
    }

    function paynow() {
        include_paypal();
        // $this->load->view('home/index');
        // After Step 1
        
        $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                $this->_clientid, // ClientID
                $this->_secret      // ClientSecret
                )
        );
        $apiContext->setConfig(array(
            'mode' => 'sandbox', //sandbox, live
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => 'logs/paypal.log',
            'log.LogLevel' => 'ERROR'));

        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal('1.00');
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(base_url() . 'paypal/paymentsuccess')
                ->setCancelUrl(base_url() . 'paypal/paymentcancel');

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);
        // After Step 3
        try {
            $payment->create($apiContext);
             echo $payment;
            /*echo "SUCCESS ";
            echo $payment;
            echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
            */
           // redirect($payment->getApprovalLink());
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo "ERROR ";
            echo $ex->getData();
        }
    }

    function paymentcancel() {
        echo "Payment is canceled";
    }

    function paymentsuccess() {
        echo "Payment is success";
        echo "<hr/>";
        
        //?paymentId=
        if($this->barik->isContains($this->barik->getCurrentURL(),"?paymentId=")) {
            
        }
    }

}
