<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers >> API keys page 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_WuE8NJ5aQEB2BrjkSgQHiQDm00TcqmkHfa'; 
$config['stripe_publishable_key'] = 'pk_test_zt3ErHFV5CattlGWHnUAwe5E00RDtCCFqn'; 
$config['stripe_currency']        = 'usd';