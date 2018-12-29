<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";

    public function product(){
        return $this->belongsTo('app\Product', 'id_product', 'id');
    }

    public function bill(){
        return $this->belongsTo('app\Bill', 'id_bill', 'id');
    }
}