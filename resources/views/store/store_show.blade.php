@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('messages.user') }}</div>

                <div class="card-body">
                    @if (session('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="content">
                        <h1>{{ trans('messages.storeShow') }} {{ $store->name }}</h1>
                        
                         <br/> <br/>
                        <table id="storetable" width="100%" class="display">
                            <thead> 
                                <tr>
                                    <td>ID</td>
                                    <td>{{ trans('messages.product') }}</td>
                                    <td>{{ trans('messages.number') }}</td>
                                    <td>Option</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->number }}</td>
                                        <td><a href="{{ route('product.add', $product->id) }}"><button> {{ trans('messages.addNumber') }}</button>
                                        </a></td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                            <br></br>
                            <a href="{{ route('product.new', $store->id) }}"><button>{{ trans('messages.addProduct') }}
                            </button></a>
                            <a href="{{ route('product.sub', $store->id) }}"><button>{{ trans('messages.subProduct') }}
                            </button></a>
                            <a href="{{ route('exportStore') }}"><button>{{ trans('messages.export') }}</button></a>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#storetable').DataTable();
    });
</script>
@endsection
