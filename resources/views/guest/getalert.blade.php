@extends('layout.master')
@section('content')
    <div class="main min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <form action="" method="post" class="w-full max-w-md p-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            @csrf
            <div class="text-center">
                <h1 class="text-2xl font-bold text-blue-600 dark:text-blue-300 mb-4">Don't Have an Account yet?</h1>
                <h2 class="text-xl font-semibold text-blue-600 dark:text-blue-300 mb-6">Let's Login or Signup</h2>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('register') }}" class="w-1/2 py-2 px-4 text-lg font-semibold text-center text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition duration-300 ease-in-out">
                        Sign Up
                    </a>
                    <a href="{{ route('login') }}" class="w-1/2 py-2 px-4 text-lg font-semibold text-center text-white bg-green-500 rounded-lg shadow-md hover:bg-green-600 focus:ring-2 focus:ring-green-300 focus:ring-opacity-50 transition duration-300 ease-in-out">
                        Login
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
