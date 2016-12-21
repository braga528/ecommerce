<?php
/**
 * Created by PhpStorm.
 * User: macbook_joel
 * Date: 08/12/16
 * Time: 12:27
 */

namespace App;

class PayPal{
    private $_apiContext;
    private $shopping_cart;
    private $_ClientId = 'ATrkH4y8JJJfp0lA--nyJXOwxNJfwkpQRElDvy9zFNz39KLKeq4GHlZaH7ZO25D08uivXRUeuMzsSsOr';
    private $_ClientSecret = 'EEagABTqF1fMFEk04DW0mzjUvyM5jIkoaSEfLX3rJtXJ9OJ6g4f0U6xAML-9_Ma-eoUCZ0eYDk2rB4HX';

    public function __construct($shopping_cart)
    {
        $this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);

        $config = config("paypal_payment");
        $flatConfig = array_dot($config);

        $this->_apiContext->setConfig($flatConfig);

        $this->shopping_cart = $shopping_cart;
    }
    public function generate(){
        $payment = \PaypalPayment::payment()->setIntent("sale")
                            ->setPayer($this->payer())
                            ->setTransactions([$this->transaction()])
                            ->setRedirectUrls($this->redirectURLs());

        try{
            $payment->create($this->_apiContext);
        }catch(\Exeption $ex){
            dd($ex);
            exit(1);
        }

        return $payment;
    }
    public function payer(){
        return \PaypalPayment::payer()->setPaymentMethod("paypal");
    }
    public function transaction(){
        return \PaypalPayment::transaction()->setAmount($this->amount())
                            ->setItemList($this->items())
                            ->setDescription("tu compra en Unipesa S.A. de C.V.")
                            ->setInvoiceNumber(uniqid());
    }
    public function amount(){
        return \PaypalPayment::amount()->setCurrency("USD")
                            ->setTotal($this->shopping_cart->totalUSD());
    }
    public function items(){
        $items = [];

        $products = $this->shopping_cart->products()->get();

        foreach ($products as $product){
            array_push($items, $product->paypalItem());
        }
        return \PaypalPayment::itemList()->setItems($items);
    }
    public function RedirectUrls(){
        $baseURL = url('/');
        return \PaypalPayment::redirectUrls()
                            ->setReturnUrl("$baseURL/payments/store")
                            ->setCancelUrl("$baseURL/carrito");
    }
    public function execute($paymentId,$payerId){
        $payment = \PaypalPayment::getById($paymentId, $this->_apiContext);

        $execution = \PaypalPayment::PaymentExecution()
                            ->setPayerId($payerId);

        return $payment->execute($execution, $this->_apiContext);
    }
}