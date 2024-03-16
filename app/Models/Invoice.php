<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
 protected $guarded = [];
    protected $fillable = ['customer_name', 'customer_email', 'customer_mobile', 'company_name', 'invoice_number', 'invoice_date', 'sub_total', 'discount_type', 'discount_value', 'vat_value', 'shipping', 'total_due'];
 public function deteils(){
    return $this->hasMany(InvoiceDetails::class,'invoice_id');
 }
 public function discountResult(){
    return $this->discount_type == 'fixed' ? $this->discount_value : $this->discount_value.'%';
 }
}