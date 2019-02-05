<?php

namespace Tests\Unit\Model;

use App\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
	public function testOrderStatusLabelTranslation()
    {
    	$order = factory(Order::class)->make([
    		'status' => 0
    	]);

    	$this->assertEquals('Created', $order->statusLabel);
    }

    /**
     * @dataProvider orderStatusLabelProvider
     */
    public function testAllCasesForOrderStatusLabelTranslation(Order $order, $label)
    {
    	$this->assertEquals($label, $order->statusLabel);
    }

    public function orderStatusLabelProvider(): array
    {
    	return [
    		[new Order(['status' => 0]), 'Created'],
    		[new Order(['status' => 1]), 'Processing'],
    		[new Order(['status' => 2]), 'Completed'],
    		[new Order(['status' => 3]), 'Cancelled'],
    		[new Order(['status' => 4]), 'Refunded'],
    	];
    }
}
