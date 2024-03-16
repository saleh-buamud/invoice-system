@extends('layouts.app')
@section( 'create')
 <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Frontend/frontend.create_invoice') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('invoice.store') }}" method="post" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="customer_name">{{ __('Frontend/frontend.customer_name') }}</label>
                                    <input type="text" name="customer_name" class="form-control">
                                    @error('customer_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="customer_email">{{ __('Frontend/frontend.customer_email') }}</label>
                                    <input type="text" name="customer_email" class="form-control">
                                    @error('customer_email')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="customer_mobile">{{ __('Frontend/frontend.customer_mobile') }}</label>
                                    <input type="text" name="customer_mobile" class="form-control">
                                    @error('customer_mobile')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="company_name">{{ __('Frontend/frontend.company_name') }}</label>
                                    <input type="text" name="company_name" class="form-control">
                                    @error('company_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="invoice_number">{{ __('Frontend/frontend.invoice_number') }}</label>
                                    <input type="text" name="invoice_number" class="form-control">
                                    @error('invoice_number')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="invoice_date">{{ __('Frontend/frontend.invoice_date') }}</label>
                                    <input type="text" name="invoice_date" class="form-control pickdate">
                                    @error('invoice_date')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table" id="invoice_details">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('Frontend/frontend.product_name') }}</th>
                                    <th>{{ __('Frontend/frontend.unit') }}</th>
                                    <th>{{ __('Frontend/frontend.quantity') }}</th>
                                    <th>{{ __('Frontend/frontend.unit_price') }}</th>
                                    <th>{{ __('Frontend/frontend.product_subtotal') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="cloning_row" id="0">
                                    <td>#</td>
                                    <td>
                                        <input type="text" name="product_name[0]" id="product_name" class="product_name form-control">
                                        @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <select name="unit[0]" id="unit" class="unit form-control">
                                            <option></option>
                                            <option value="piece">{{ __('Frontend/frontend.piece') }}</option>
                                            <option value="g">{{ __('Frontend/frontend.gram') }}</option>
                                            <option value="kg">{{ __('Frontend/frontend.kilo_gram') }}</option>
                                        </select>
                                        @error('unit')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[0]" step="0.01" id="quantity" class="quantity form-control">
                                        @error('quantity')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="unit_price[0]" step="0.01" id="unit_price" class="unit_price form-control">
                                        @error('unit_price')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="row_sub_total[0]" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">
                                        @error('row_sub_total')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                </tr>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <button type="button" class="add btn btn-primary">add product</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.sub_total') }}</td>
                                    <td><input type="number" step="0.01" name="sub_total" id="sub_total" class="sub_total form-control" readonly="readonly"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.discount') }}</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <select name="discount_type" id="discount_type" class="discount_type custom-select">
                                                <option value="fixed">{{ __('Frontend/frontend.sr') }}</option>
                                                <option value="percentage">{{ __('Frontend/frontend.percentage') }}</option>
                                            </select>
                                            <div class="input-group-append">
                                                <input type="number" step="0.01" name="discount_value" id="discount_value" class="discount_value form-control" value="0.00">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.vat') }}</td>
                                    <td><input type="number" step="0.01" name="vat_value" id="vat_value" class="vat_value form-control" readonly="readonly"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.shipping') }}</td>
                                    <td><input type="number" step="0.01" name="shipping" id="shipping" class="shipping form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.total_due') }}</td>
                                    <td><input type="number" step="0.01" name="total_due" id="total_due" class="total_due form-control" readonly="readonly"></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="text-right pt-3">
                            <button type="submit" name="save" class="btn btn-primary">{{ __('Frontend/frontend.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <script>
$(document).ready(function(){
    // $('.pickdate').pickadate({
    //     format:'yyyy-mm-dd',
    //     selectMonth: true,
    //     selectYear: true,
    //     clear:'Clear',
    //     close:'OK',
    //     closeOnSelect:true

    // });
    $('#invoice_details').on('keyup blur','.quantity', function() {
        let $row = $(this).closest('tr');
        let quantity = $row.find('.quantity').val() || 0;
        let unit_price = $row.find('.unit_price').val() || 0;
        $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2));
        $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });
    
    $('#invoice_details').on('keyup blur','.unit_price', function() {
        let $row = $(this).closest('tr');
        let quantity = $row.find('.quantity').val() || 0;
        let unit_price = $row.find('.unit_price').val() || 0;
        $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2));
        $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });
    
    $('#invoice_details').on('keyup blur','.discount_type', function() {
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });
    
    $('#invoice_details').on('keyup blur','.discount_value', function() {
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });
  
    $('#invoice_details').on('keyup blur','.shipping', function() {
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());
    });
    
    
    let sum_total = function($selector){
        let sum = 0;
        $($selector).each(function(){
            let selectorVal = $(this).val() !== '' ? parseFloat($(this).val()) : 0;
            sum += selectorVal;
        });
        return sum.toFixed(2);
    };
    
    let calculate_vat = function(){
        let sub_totalVal = parseFloat($('.sub_total').val()) || 0; 
        let discount_type = $('.discount_type').val();
        let discount_value = parseFloat($('.discount_value').val()) || 0;
        let discountVal = discount_value != 0 ? (discount_type === 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value) : 0;
        let vatVal = (sub_totalVal - discountVal) * 0.05;
        return vatVal.toFixed(2);
    };
    
    let sum_due_total = function(){
        let sum = 0; 
        let sub_totalVal = parseFloat($('.sub_total').val()) || 0; 
        let discount_type = $('.discount_type').val();
        let discount_value = parseFloat($('.discount_value').val()) || 0;
        let discountVal = discount_value != 0 ? (discount_type === 'percentage' ? sub_totalVal * (discount_value / 100) : discount_value) : 0;
        let vatVal = parseFloat($('.vat_value').val()) || 0; 
        let shippingVal = parseFloat($('.shipping').val()) || 0; 
        sum += sub_totalVal;
        sum -= discountVal;
        sum += vatVal;
        sum += shippingVal;
        return sum.toFixed(2);
    };
   $(document).on('click','.add',function(){
    
        let trCount = $('#invoice_details').find('tr.cloning_row:last').length;
        let numberIncr = trCount > 0 ? parseInt($('#invoice_details').find('tr.cloning_row:last').attr('id')) + 1 : 0;
        $('#invoice_details').find('tbody').append($(' ' +
                                  ' <tr class="cloning_row" id="' + numberIncr + '">'+
                                    '<td><button type="button" class="btn btn danger btn-sm delegated-btn"><></buttoni class="fa fa-minus"></i></td>'+
                                    '<td>'+
                                       ' <input type="text" name="product_name[0]" id="product_name" class="product_name form-control">'+
                                        
                                    '</td>'+
                                   ' <td>'+
                                       ' <select name="unit[0]" id="unit" class="unit form-control">'+
                                           ' <option></option>'+
                                            '<option value="piece">{{ __('Frontend/frontend.piece') }}</option>'+
                                           ' <option value="g">{{ __('Frontend/frontend.gram') }}</option>'+
                                           ' <option value="kg">{{ __('Frontend/frontend.kilo_gram') }}</option>'+
                                      '</select>'+
                                       
                                  '</td>'+
                                   '<td>'+
                                        '<input type="number" name="quantity[0]" step="0.01" id="quantity" class="quantity form-control">'+
                                      
                                   '</td>'+
                                  '<td>'+
                                       ' <input type="number" name="unit_price[0]" step="0.01" id="unit_price" class="unit_price form-control">'+
                                       
                                  '</td>'+
                                    '<td>'+
                                       ' <input type="number" step="0.01" name="row_sub_total[0]" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">'+
                                       
                                 '</td>'+
                              '</tr>'
       ));
       $(document).on('click','.delegated-btn',function(e){
         e.preventDefault();
         $(this).parent().parent().remove();
             $('#sub_total').val(sum_total('.row_sub_total'));
        $('#vat_value').val(calculate_vat());
        $('#total_due').val(sum_due_total());

       })
    })
});



    </script>
    @endsection
