<x-auth-layout>
    <x-slot:title>Login</x-slot:title>

    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{Route('auth.authenticate')}}">
                                @csrf
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
                                <button type="submit" class="btn btn-success mt-2">Log In</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="{{Route('auth.register')}}">Register</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>


</x-auth-layout>