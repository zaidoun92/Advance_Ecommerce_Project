@extends('frontend.main_master')


@section('content')


{{-- @php
    $user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp --}}

<div class="body-content">
    <div class="container">
        <div class="row">


            @include('frontend.common.user_sidebar')


            <div class="col-md-2">

            </div> {{--  end col --}}


            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Change Password</h3>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.password.update')}}" class="register-form outer-top-xs">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password</label>
                                <input name="oldpassword" id="current_password" type="password" autofocus class="form-control unicase-form-control text-input">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password</label>
                                <input name="password" id="password" type="password" autofocus class="form-control unicase-form-control text-input">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone</label>
                                <input name="password_confirmation" id="password_confirmation" type="password" autofocus class="form-control unicase-form-control text-input">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div> {{--  end col --}}
        </div> {{--  end row --}}
    </div> {{--  end container --}}
</div>


@endsection

