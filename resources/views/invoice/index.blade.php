@extends('layouts.app')
@section( 'index')
  <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <h2>invoices</h2>
                   
                    <a href="{{ route('invoice.create') }}" class="btn btn-primary ml-auto"><i class="fa-solid fa-plus"></i></a>
                </div>


                    <div class="table-responsive">
                        <table class="table card-table">
                            <thead>
                            <tr>
                                <th>customer_name</th>
                                <th>invoice_date</th>
                                <th>total_due</th>
                                <th>actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                            <tr>
                                <td><a href="{{route('invoice.show',$invoice->id)}}">{{ $invoice->customer_name }}</a></td>
                                <td>{{ $invoice->invoice_date }}</td>
                                <td>{{ $invoice->total_due }}</td>
                                <td>
                                    <a href="{{route('invoice.edit',$invoice->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                      <a href="{{route('invoice.show',$invoice->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i>Shoe</a>
                                   <form action="{{route('invoice.destroy',$invoice->id)}}" method="POST" id="delete-{{$invoice->id}}" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                         <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>

                                      </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="float-right" style="height: 30px;">
                                        {!! $invoices->links() !!}
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>


            </div>
        </div>
    </div>


@endsection