@extends('layouts.app')

@section('content')
<div class="container dashboard-container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <x-user-dashboard-navigation/>
        </div>
        <div class="col-md-8">
            <form action="{{ route('user-password.update') }}" method="post">@csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header text-white" style="background-color: red">Change password</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Current pasword</label>
                            <input type="text" name="current_password" class="form-control">
                            @error('current_password')
                                <div>{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>New pasword</label>
                            <input type="text" name="password" class="form-control">

                            @error('password')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm pasword</label>
                            <input type="text" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <div>{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">Update password</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
