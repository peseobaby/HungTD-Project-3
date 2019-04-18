@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('messages.admin') }}</div>
                <div class="card-body">
                     @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="head">
                        <h1>{{ trans('messages.addStore') }}</h1>
                    </div>
                    <div class="content">
                        <a href="{{ asset('') }}home" class="button">{{ trans('messages.back') }}</a><br/><br/>
                        <form method="post" action="{{ route('store.add') }}" role="form">
                            {{ csrf_field() }}
                            <table width="50%" cellspacing="0" cellpadding="10">
                                 <tr>
                                    <td>{{ trans('messages.storeName') }}<span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="name" class="form-control" placeholder="{{ trans('messages.storeName') }}">
                                        @if($errors->has('name'))
                                            <li style="color: red">
                                            {{ $errors->first('name') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ trans('messages.storeManager') }}<span class="errors" style="color: red" >*</span></td>
                                    <td>
                                    	<select name="user">
                                    		@foreach($users as $user)
                                    			<option value="{{ $user->username }}">{{ $user->username }}</option>
                                    		@endforeach
                                    	</select>
                                    </td>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">{{ trans('messages.addStore') }}</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection