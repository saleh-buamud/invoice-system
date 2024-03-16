<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'unit', 'quantity', 'unit_price', 'row_sub_total'];
  public  function invoice(){
      return $this->belongsTo(Invoice::class,'invoice_id','id');
  } 
}