@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('messages.user') }}</div>

                <div class="card-body">
                    @if (session('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="content">
                        <h1>{{ trans('messages.show') }}</h1>
                        <table width="50%" cellspacing="0" cellpadding="10">
                            <tr>
                                <td>{{ trans('messages.account') }}</td>
                                <td><b>{{ $user->username }}</b></td>
                            </tr>
                            <tr>
                                <td>{{ trans('messages.name') }}</td>
                                 <td><b>{{ $user->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><b>{{ $user->email }}</b></td>
                            </tr>
                            <tr>
                                <td>{{ trans('messages.store') }}</td>
                                <td>
                                    @if($user->store_id != null)
                                        <b>{{ $user->store->name }}</b>
                                        <a href="{{ route('store.show', $user->store_id) }}"><button class="edit">{{ trans('messages.storeShow') }}</button></a>
                                    @else 
                                        {{ trans('messages.storeMessage') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="{{ route('user.edit', $user->id) }}"><button>{{ trans('messages.updateUser') }}</button></a></td>
                            </tr>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
