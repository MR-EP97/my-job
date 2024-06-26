@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <form action="{{route('login.post')}}" method="POSt">
                            @csrf
                            <div class="card-body">Login</div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control">
                                    @if($errors->has('password'))
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary mt-2">Login</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
