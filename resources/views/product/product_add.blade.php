@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('messages.user') }}</div>
                <div class="card-body">
                     @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="head">
                        <h1>{{ trans('messages.addProduct') }}</h1>
                    </div>
                    <div class="content">
                        <a href="{{ route('store.show', Auth::user()->store_id) }}" class="button">{{ trans('messages.back') }}</a><br/><br/>
                        <form method="post" action="{{ route('new.add', Auth::user()->store_id) }}" role="form">
                            {{ csrf_field() }}
                            <table width="50%" cellspacing="0" cellpadding="10">
                                 <tr>
                                    <td>{{ trans('messages.product') }}<span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="name" class="form-control" placeholder="{{ trans('messages.product') }}">
                                        @if($errors->has('name'))
                                            <li style="color: red">
                                            {{ $errors->first('name') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ trans('messages.number') }}<span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="number" name="number" class="form-control" placeholder="{{ trans('messages.number') }}">
                                        @if($errors->has('number'))
                                            <li style="color: red">
                                            {{ $errors->first('number') }}
                                        @endif
                                    </td>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">{{ trans('messages.addProduct') }}</button></td>
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