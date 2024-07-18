<?php

use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
    if(auth()->check()){    
        if(auth()->user()->is_admin){
            return redirect('admin');
        }else{
            return redirect('dashboard');
        }
        }else{
        return redirect('admin/login');
    }
    });


    


