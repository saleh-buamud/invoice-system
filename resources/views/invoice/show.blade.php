@extends('layouts.app')

@section('show')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <h2>invoice_number :{{ $invoice->invoice_number }}</h2> <br>
                    <a href="{{ route('invoice.index') }}" class="btn btn-primary ml-auto"><i class="fa fa-home"></i>  back_to_invoice </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>customer_name</th>
                                <td>{{ $invoice->customer_name }}</td>
                                <th>customer_email</th>
                                <td>{{ $invoice->customer_email }}</td>
                            </tr>
                            <tr>
                                <th>customer_mobile</th>
                                <td>{{ $invoice->customer_mobile }}</td>
                                <th>company_name</th>
                                <td>{{ $invoice->company_name }}</td>
                            </tr>
                            <tr>
                                <th>invoice_number</th>
                                <td>{{ $invoice->invoice_number }}</td>
                                <th>invoice_date</th>
                                <td>{{ $invoice->invoice_date }}</td>
                            </tr>
                        </table>

                        <h3>invoice_details</h3>

                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>product_name</th>
                                <th>unit</th>
                                <th>quantity</th>
                                <th>unit_price</th>
                                <th>product_subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice->deteils as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->unitText() }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->row_sub_total }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">sub_total</th>
                                <td>{{ $invoice->sub_total }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">discount</th>
                                <td>{{ $invoice->discountResult() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">vat</th>
                                <td>{{ $invoice->vat_value }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">shipping</th>
                                <td>{{ $invoice->shippint }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">total_due'</th>
                                <td>{{ $invoice->total_due }}</td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{route('invoice.print',$invoice->id)}}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i> print</a>
                            <a href="#" class="btn btn-secondary btn-sm ml-auto"><i class="fa fa-file-pdf"></i>export_pdf</a>
                            <a href="#" class="btn btn-success btn-sm ml-auto"><i class="fa fa-envelope"></i> send_to_email</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

