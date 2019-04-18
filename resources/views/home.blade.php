@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('messages.admin') }}</div>

                <div class="card-body">
                    @if (session('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="content">
                        <h1>{{ trans('messages.home') }}</h1>

                        <table id="hometable" width="100%" class="display">
                            <thead>   
                                <tr>
                                    <td>ID</td>
                                    <td>{{ trans('messages.account') }}</td>
                                    <td>{{ trans('messages.name') }}</td>
                                    <td>Email</td>
                                    <td>{{ trans('messages.store') }}</td>
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->store_id != null)
                                                {{ $user->store->name }}
                                            @else 
                                                {{ trans('messages.storeMessage') }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> 
                        </table>
                        <br></br>
                        <div class="a" style="margin: auto"></div>
                            <a href="{{ route('user.add') }}"><button class="addUser">{{ trans('messages.addUser') }}
                            </button></a> 
                            <a href="{{ route('store.add') }}"><button class="addStore">{{ trans('messages.addStore') }}
                            </button></a>
                            <a href="{{ route('export') }}"><button class="edit">{{ trans('messages.export') }}</button></a>
                            <a href="{{ route('form.reset') }}"><button>{{ trans('messages.rs') }}</button></a>
                        </div>    
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#hometable').DataTable();
    });
</script>
@endsection
