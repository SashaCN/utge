<?php

namespace App\Mail;

use App\Models\Customers;
use App\Models\Product;
use App\Models\ProductsOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductOrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $ProductOrder;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customers $customers, ProductsOrder $productsOrder, Product $productsall)
    {
        $this->customers = $customers;
        $this->productsOrder = $productsOrder;
        $this->productsall = $productsall;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.email.productOrder', [
            'customers' => $this->customers,
            'order' => $this->productsOrder,
            'productsall' => $this->productsall
        ]);
    }
}
