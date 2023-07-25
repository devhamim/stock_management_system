@extends('backend.layouts.app')

@section('content')

      <div class="content-page">
      <div class="container-fluid">
         <div class="row">

            <div class="col-xl-12 col-lg-11">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">New User Information</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="new-user-info">
                           <form method="POST" action="{{ route('user.reg') }}" enctype="multipart/form-data">
                            @csrf
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="fname">User Name:</label>
                                    <input type="text" name="name" class="form-control" id="fname" placeholder="User Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="img">Image:</label>
                                    <input type="file" name="image" class="form-control" id="img">
                                        
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label>User Role:</label>
                                    <select name="is_admin" class="selectpicker form-control" data-style="py-0">
                                       <option readonly>--Select--</option>
                                       <option value="1">CEO</option>
                                       <option value="2">Manager</option>
                                       <option value="3">Moderator</option>
                                       <option value="0">User</option>
                                    </select>

                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="add1">Address:</label>
                                    <input type="text" name="address" class="form-control" id="add1" placeholder="Street Address 1">

                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="mobno">Mobile Number:</label>
                                    <input type="number" name="phone" class="form-control" id="mobno" placeholder="Mobile Number">

                                 </div>

                                 <div class="form-group col-md-6">
                                    <label for="pass">Password:</label>
                                    <input type="password" name="password" class="form-control" id="pass" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="rpass">Repeat Password:</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="rpass" placeholder="Repeat Password ">
                                 </div>

                              </div>

                              <button type="submit" class="btn btn-primary">Add New User</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      </div>
    </div>
    <!-- Wrapper End-->
@endsection
