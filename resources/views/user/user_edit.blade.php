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
                        <h1>{{ trans('messages.updateUser') }}{{ $user->name }}</h1>
                    </div>
                    <div class="content">
                        <form method="post" action="{{ route('user.update',$id) }}" role="form">
                            
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>{{ trans('messages.name') }}<span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="name" class="form-control" 
                                        placeholder="{{ trans('messages.name') }}">
                                        @if($errors->has('name'))
                                            <li style="color: red">
                                            {{ $errors->first('name') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                        @if($errors->has('email'))
                                            <li style="color: red">
                                            {{ $errors->first('email') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ trans('messages.password') }}<span class="errors" style="color: red" >*
                                    </span></td>
                                    <td>
                                        <input type="password" name="password" class="form-control" 
                                        placeholder="{{ trans('messages.password') }}">
                                        @if($errors->has('password'))
                                            <li style="color: red">
                                            {{ $errors->first('password') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ trans('messages.password_confirmation') }}<span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="password" name="password_confirmation" class="form-control" 
                                        placeholder="{{ trans('messages.password_confirmation') }}">
                                        @if($errors->has('password_confirmation'))
                                            <li style="color: red">
                                            {{ $errors->first('password_confirmation') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">{{ trans('messages.updateUser') }}</button></td>
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