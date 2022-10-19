<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Scripts -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href='https://css.gg/profile.css' rel='stylesheet'>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('DataTables-1.12.1/css/dataTables.bootstrap5.min.css')}}"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  
</head>
<body>
    <x-auth-card>         
         <div class="container">
             <p class="h1 mb-3 text-center">Login</p>
             <div class="m-4 ">
                    <svg class="mx-auto" width="80px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M272 304h-96C78.8 304 0 382.8 0 480c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32C448 382.8 369.2 304 272 304zM48.99 464C56.89 400.9 110.8 352 176 352h96c65.16 0 119.1 48.95 127 112H48.99zM224 256c70.69 0 128-57.31 128-128c0-70.69-57.31-128-128-128S96 57.31 96 128C96 198.7 153.3 256 224 256zM224 48c44.11 0 80 35.89 80 80c0 44.11-35.89 80-80 80S144 172.1 144 128C144 83.89 179.9 48 224 48z"/></svg>
             </div>
         </div>
         <!-- Session Status -->
         <x-auth-session-status class="mb-4" :status="session('status')" />
 
         <!-- Validation Errors -->
         <x-auth-validation-errors class="mb-4" :errors="$errors" />
 
         <div class="container">
             
             <form method="POST" action="{{ route('login') }}">
                 
                 @csrf
     
                 <!-- Email Address -->
                 <div>
                     <x-label for="email" :value="__('')" />
     
                     <x-input id="email" class="block mt-1 w-full" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus />
                 </div>
     
                 <!-- Password -->
                 <div class="mt-4">
                     <x-label for="password" :value="__('')" />
     
                     <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     required autocomplete="current-password" 
                                     placeholder="Password"
                                     />
                 </div>
     
                 <!-- Remember Me -->
                 <div class="block mt-4">
                     <label for="remember_me" class="inline-flex items-center">
                         <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                         <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                     </label>
                 </div>
     
                 <div class="flex items-center justify-end mt-4">
                     @if (Route::has('password.request'))
                         <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                             {{ __('Forgot your password?') }}
                         </a>
                     @endif
     
                     <button type="submit" class="btn btn-primary mx-auto">Login</button>
                 </div>
             </form>
         </div>
 
     </x-auth-card>

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

</body>
</html>

