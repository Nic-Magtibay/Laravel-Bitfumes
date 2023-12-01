<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//  DB + QUERY BUILDER + ELOQUENT

Route::get('/',function(){
    $users = User::find(8);
//DB
// $users =DB::table('users')->insert([
//     'name'=>'nic',
//     'email' =>'nic1@gmail.com',
//     'password' =>'pass12345']);

// //Query Builder
// $users =DB::insert('insert into users (name,email,password) values (?,?,?)',['ole','nic2@gmail.com','12345678']);

// //Eloquent
//    $users=User::create([
//     'name'=>'mag',
//     'email'=> 'nic3333@gmail.com',
//     "password"=>'12345433'
//    ]);
    dd($users->name);
});

   // $users= User::where('id',1)->first();
//    $users=User::create([
//     'name'=>'mm',
//     'email'=> 'mnm@gmail.com',
//     "password"=>'12345433'
//    ]);

    // $user = User::find(6);
    // // $user->update(['email'=>'kk@gmail.com']);
    // $user->delete(['email'=>'kk@gmail.com']);




// Route::get ('/',function(){
//   $users=DB::table('users')->find(1);

// $users =DB::table('users')->insert([
// // //     'name'=>'Mags',
// // //     'email' =>'mags@gmail.com',
// // //     'password' =>'pass12345'
// // //    ]);
//  // UPDATE  $users =DB::table('users')->where('id',3)->update(['email' => 'abc@gmail.com']);
//    // $users=DB::table('users')->where('id',3)->delete();
//     dd($users);
// });

// Route::get('/', function () {
//     $users =DB::select("select * from users");
//  $users =DB::insert('insert into users (name,email,password) values (?,?,?)',['Josh','josh@gmail.com','12345678']);
//     dd($users);
// });


// Route::get('/', function () {
//     $users =DB::select("Select * from users where email=?",['nic@gmail.com']);
//     dd($users);   THIS USED WHEN YOU WANT TO FECTH SPECIFIC DATA
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
