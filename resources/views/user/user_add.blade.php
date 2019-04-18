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
                        <h1>{{ trans('messages.addUser') }}</h1>
                    </div>
                    <div class="content">
                        <a href="{{ asset('') }}home" class="button">{{ trans('messages.back') }}</a><br/><br/>
                        <form method="post" action="{{ route('home') }}" role="form">
                            {{ csrf_field() }}
                            <table width="50%" cellspacing="0" cellpadding="10">
                                 <tr>
                                    <td>{{ trans('messages.account') }}<span class="errors" style="color: red" >*</span>
                                    </td>
                                    <td>
                                        <input type="text" name="username" class="form-control" 
                                        placeholder="{{ trans('messages.account') }}">
                                        @if($errors->has('username'))
                                            <span style="color: red">
                                            {{ $errors->first('username') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                         @if($errors->has('email'))
                                            <span style="color: red">
                                            {{ $errors->first('email') }}
                                        @endif
                                    </td>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">{{ trans('messages.addUser') }}</button></td>
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