<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stripe
 *
 * @author jhovarie.guiang
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Stripe extends CI_Controller {

    function __construct() {
        parent::__construct();
        include_stripe();
        include_passkey(); 
    }

    //put your code here
    function index(){
        $this->load->view('stripe/index');
    }
    
    function paynow(){
        \Stripe\Stripe::setApiKey ( get_stripe_secretkey() ); //this is your secreet key
	try {
		\Stripe\Charge::create ( array (
				//"amount" => 300 * 100, //you will pay $300
				//"amount" => 100 * 100, //you will pay $100
				"amount" => $this->input->post('amount') * 100, //you will pay $100
				"currency" => "usd",
				"source" => $this->input->post ( 'stripeToken' ), // obtained with Stripe.js
				"description" => "Test payment." 
		) );
		//Session::flash ( 'success-message', 'Payment done successfully !' );
		//return Redirect::back ();
		//return redirect(base_url().'stripe/success');
                echo "Stripe successfuly paid";
	} catch ( \Exception $e ) {
		//Session::flash ( 'fail-message', "Error! Please Try again." );
                echo "Stripe Failed to pay";
		//return Redirect::back ();
	}
    }
    function paymentcancel() {
        echo "Payment is canceled";
    }

    function paymentsuccess() {
        echo "Payment is success";
        echo "<hr/>";
    }
}
