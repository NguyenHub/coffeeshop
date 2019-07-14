<?php

namespace App;
use Session;
class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;
	public $totalItem=1;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->totalItem = $oldCart->totalItem;
		}
	}

	public function add($item, $id, $sl){
		$giohang = ['qty'=>0, 'price' => $item->dongia, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
				$this->totalItem+=0;
			}
			else
			{
				$this->totalItem+=1;
			}
			
		}
		$giohang['qty']+=$sl;
		$giohang['price'] = $item->dongia * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty+=$sl;
		$this->totalPrice += $item->dongia*$sl;
	}
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['promotion_price'];
		$this->totalQty--;
		$this->totalPrice  -= $this->items[$id]['item']['dongia'];		
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalItem--;
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
