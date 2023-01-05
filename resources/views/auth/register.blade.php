<x-auth-layout>
    <x-slot:title>Register</x-slot:title>

    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{Route('auth.store')}}">
                                @csrf
                                <div class="form-group ">
                                    <label for="name">Nama</label>
                                    <input value="{{old('name')}}" required class="form-control" type="text" name="name" id="" placeholder="Nama">
                                    
                                    @error('name') 
                                    <span class="text-danger">{{ $message }}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="username">Username</label>
                                    <input value="{{old('username')}}" required class="form-control" type="text" name="username" id="" placeholder="Username">
                                    
                                    @error('username') 
                                    <span class="text-danger">{{ $message }}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input value="{{old('password')}}"  required class="form-control" type="password" name="password" id="" placeholder="Password">
                                    @error('password') 
                                    <span class="text-danger">{{ $message }}</span>                                        
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input  required class="form-control" type="password" name="password_confirmation" id="" placeholder="Password Confirmation">
                                    @error('password_confirmation') 
                                    <span class="text-danger">{{ $message }}</span>                                        
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success mt-2">Register</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="{{Route('auth.login')}}">Login</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>


</x-auth-layout>