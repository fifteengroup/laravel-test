<?php
namespace App\Interfaces;

interface OrderRepositoryInterface
{
	public function all();
	public function getContacts();
	public function getOrderItems($order_id);
}

 ?>