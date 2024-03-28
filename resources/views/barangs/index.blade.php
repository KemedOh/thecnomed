@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">{{ __('Table Barang') }}</div>
                <div class="card-body">
                    <a href="{{route('barangs.create')}}" class="btn btn-sm btn-secondary">
                        Tambah Barang
                    </a>
                    <table class="table table-striped" id="barangs">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Buying Price</th>
                                <th scope="col">Product Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            
                            @foreach($barangs as $row)
                            <?php    $no++ ?>
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->qty}}</td>
                                <td>{{$row->selling_price}}</td>
                                <td>{{$row->buying_price}}</td>
                                <td>{{$row->product_type->product_type_id}}</td>
                                <td>
                                    <a href="{{ route('barangs.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('barangs.destroy', $row->id) }}" method="POST"
                                    style="display: inline" onsubmit="return confirm('Do you really want to delete {{ $row->product_name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><span class="text-muted">
                                        Delete
                                    </span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new DataTable('#users');
</script>
@endsection