<?php
/**
 * Description of Paypal
 *
 * @author jhovarie.guiang
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal extends CI_Controller {
    
     //sandbox barik
    private $_clientid = "your paypal clientid";
    private $_secret = "your paypal secret key";
    
    function __construct() {
        parent::__construct();
        require 'vendor/autoload.php';
        include_passkey(); 
        $this->_clientid = get_paypal_clientid();
        $this->_secret = get_paypal_secretkey();
    }
    
    function index(){
        echo "<h1>Paypal Example</h1>";
        echo '<a href="'.base_url().'paypal/paynow">Pay Now</a>';
    }

    function paynow() {
        //include_paypal();
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
            redirect($payment->getApprovalLink());
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
