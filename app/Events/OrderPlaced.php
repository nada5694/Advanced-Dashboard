<?php
namespace App\Events;

use Illuminate\Queue\SerializesModels;

class OrderPlaced
{
    use SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
