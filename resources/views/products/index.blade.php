@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-{{ session('alert-type') }}" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type Code</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead> <!-- End: thead -->

                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>{{ $product -> id }}</td>
                                <td>{{ $product -> name }}</td>
                                <td>{{ $product -> type_code }}</td>
                                <td>{{ $product -> quantity }}</td>
                                <td>{{ $product -> price }}</td>
                            </tr><!-- End tr -->
                            @empty
                            <tr>
                                <td colspan="5">No Products Found</td>
                            </tr><!-- End: tr -->
                            @endforelse
                        </tbody> <!-- End: tbody -->

                        <tfoot>
                            <tr>
                                <td colspan="5">{{ $products->links() }}</td>
                            </tr> <!-- End: tr -->
                        </tfoot> <!-- End: tfoot -->

                    </table> <!-- End: tabel -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
