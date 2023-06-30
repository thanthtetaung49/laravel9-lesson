<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomerController;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return "Welcome to home page.";
});

Route::get('/about', function () {
    return "Welcome to about page.";
});

Route::get('user/login', function () {
    return "Welcome to user login page.";
});

Route::get('user/{id}', function ($id) {
    return "User id is " . $id;
});

Route::get('user/{id?}/{userdevice?}', function ($id = 1, $userdevice = "laptop") {
    return "User id is " . $id . " and using device is " . $userdevice;
});

Route::get('homePage/intro', function () {
    $num1 = 10;
    $num2 = 20;
    $result = $num1 + $num2;
    return view('homePage', [
        "num1" => $num1,
        "num2" => $num2,
        "result" => $result
    ]);
})->name("myHome");

Route::get('aboutPage', function () {
    return view('aboutPage', [
        "hasValue" => "value",
        "emptyValue" => null,
        "fruits" => ["mango", "orange", "banana", "apple", "pineapple"]
    ]);
})->name("abt");

// Route::get('contactPage',function(){
//     return view('contactPage', [
//         "message" => "This is testing message from server side."
//     ]);
// });

// Route::view("URI", "view path", "parameter")
Route::view("contactPage", "contactPage", [
    "num1" => 10,
    "num2" => 20
])->name("cnt");

Route::view("servicePage", "servicePage", [
    "message" => "This is service message from service side."
])->name("svp");

Route::get('customerPage', function () {
    return view('customer.customerPage');
});

Route::get('resultPage/{num1}/{num2}', function ($num1, $num2) {
    $result = $num1 + $num2;
    return view('result', ["result" => $result]);
})->name("myResult");

Route::get('singlePara/{name?}', function ($name = 'name is empty') {
    return "Name is " . $name;
})->name("name");

Route::get('vipCustomer/maleList', function () {
    return view('customer.vipCustomer.male.list');
});

Route::get('vipCustomer/femaleList', function () {
    return view('customer.vipCustomer.female.list');
});

Route::get('sum/{num1}/{num2}', function ($num1, $num2) {
    return $num1 + $num2;
});

Route::get('multiply/{num1}/{num2}', fn ($num1, $num2) => $num1 * $num2);

// https://fakestoreapi.com/products
// pure php code
Route::get('apiData', function () {
    // echo "<pre>";
    $data = file_get_contents('https://fakestoreapi.com/products');
    $jsonData = json_decode($data); // decode API JSON format

    // var_dump($jsonData);
    // dd($jsonData);
    // dd($jsonData[0]->image);

    // $result = array_filter($jsonData, function($j){
    //     return $j->price < 15;
    // });

    $result = array_filter($jsonData, fn ($j) => $j->price < 10);

    dd($result);
});

// laravel code
Route::get('laravelData', function () {
    $data = Http::get('https://fakestoreapi.com/products')->json();
    $collectOne = collect($data)->where("price", "<", 10);
    $collectTwo = collect($data)->whereIn("price", [168, 109]);

    $firstNumber = collect($data)->first();
    $lastNumber = collect($data)->last();

    $arrayNumber = [0, 5, 10, 11, 20, 4, 100, 20];
    $maxNumber = collect($arrayNumber)->max();
    $minNumber = collect($arrayNumber)->min();

    dd($data);
});

// POST method
Route::view('userRegister', 'userRegister');

Route::post('postTest/{id}/{name}', function (Request $request, $id, $name) {
    $userData = [
        'name' => $request->userName,
        'age' => $request->userAge,
        'address' => $request->userAddress,
        'gender' => $request->userGender
    ];

    dd($request->all(), $userData, $id, $name);
})->name('pst');

// Controller 
// command => php artisan make:controller ControllerName
Route::get('testingController', [CustomerController::class, 'testing']);
Route::view('page/admin', 'adminPage');
Route::post('adminPage/{greeting}/{number}', [AdminController::class, 'adminData'])->name('admin');
Route::get('compact/list', [AdminController::class, 'compactTest']);

// Client home page
Route::get('client/home', [ClientController::class, 'home'])->name('client#home');
Route::post('client/insert', [ClientController::class, 'insert'])->name('client#insert');
Route::get('client/read', [ClientController::class, 'read'])->name('client#read');

// User data request 
// Client -> web.php -> controller -> model -> database -> response -> controller -> web.php -> client

// Model
// command => php artisan make:model ModelName

// Migration
// command => php artisan migrate(up)
            // php artisan make:migration tableName(up)
            // php artisan migrate:status(check)
            // php artisan migrate:rollback(down)
            // {state 1 > state 2 > state 3 | rollback | state 3 > state 2 > state 1}
            // php artisan migrate:fresh(down + up)
            // php artisan migrate:refresh(down + up)

                // M           + V     + C
// Customer = model | model + view + conroller

// Model + Table + Controller
// command => php artisan make:model ModelName (model)
            // php artisan make:model ModelName -m (model + table) | -m means migration
            // php artisan make:model ModelName -mc (model + table + controller) | c means controller

// Laravel Data Type
// $table->bigIncrements('id'); 	Incrementing ID using a "big integer" equivalent.
// $table->bigInteger('votes'); 	BIGINT equivalent to the table
// $table->binary('data'); 	BLOB equivalent to the table
// $table->boolean('confirmed'); 	BOOLEAN equivalent to the table
// $table->char('name', 4); 	CHAR equivalent with a length
// $table->date('created_at'); 	DATE equivalent to the table
// $table->dateTime('created_at'); 	DATETIME equivalent to the table
// $table->decimal('amount', 5, 2); 	DECIMAL equivalent with a precision and scale
// $table->double('column', 15, 8); 	DOUBLE equivalent with precision, 15 digits in total and 8 after the decimal point
// $table->enum('choices', array('foo', 'bar')); 	ENUM equivalent to the table
// $table->float('amount'); 	FLOAT equivalent to the table
// $table->increments('id'); 	Incrementing ID to the table (primary key).
// $table->integer('votes'); 	INTEGER equivalent to the table
// $table->longText('description'); 	LONGTEXT equivalent to the table
// $table->mediumInteger('numbers'); 	MEDIUMINT equivalent to the table
// $table->mediumText('description'); 	MEDIUMTEXT equivalent to the table
// $table->morphs('taggable'); 	Adds INTEGER taggable_id and STRING taggable_type
// $table->nullableTimestamps(); 	Same as timestamps(), except allows NULLs
// $table->smallInteger('votes'); 	SMALLINT equivalent to the table
// $table->tinyInteger('numbers'); 	TINYINT equivalent to the table
// $table->softDeletes(); 	Adds deleted_at column for soft deletes
// $table->string('email'); 	VARCHAR equivalent column
// $table->string('name', 100); 	VARCHAR equivalent with a length
// $table->text('description'); 	TEXT equivalent to the table
// $table->time('sunrise'); 	TIME equivalent to the table
// $table->timestamp('added_on'); 	TIMESTAMP equivalent to the table
// $table->timestamps(); 	Adds created_at and updated_at columns
// $table->rememberToken(); 	Adds remember_token as VARCHAR(100) NULL
// ->nullable() 	Designate that the column allows NULL values
// ->default($value) 	Declare a default value for a column
// ->unsigned() 	Set INTEGER to UNSIGNED
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
