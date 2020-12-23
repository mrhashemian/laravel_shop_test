<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::all();
    return view('index', [
        'products' => $products,
    ]);
});
Route::get('/products/{slug}', function ($slug) {
    $products = Product::where('slug', $slug)->get();
    return view('product', [
        'products' => $products,
    ]);
});
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

    Route::get('/products', function () {
        $products = Product::all();
        return view('dashbord.products', [
            'products' => $products,
        ]);
    });
    Route::get('/products/new', function () {
        return view('dashbord.newproduct');
    });
    Route::post('/products/new', function () {
        Product::create([
            'title' => request('title'),
            'slug' => request('title'),
            'price' => request('price'),
            'content' => request('content'),
        ]);
        return redirect('/admin/products');
    });
        
});
Route::post('/checkout', function () {
    $number = request('number');
    $price = request('price');
    $details = request('details');
    
    $data = array(
        'MerchantID' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
        'Amount' => $price * $price,
        'CallbackURL' => '/checkout/callback',
        'Description' => $details,
    );
    $jsonData = json_encode($data);
    $ch = curl_init('https://www.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');
    curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
    ));
    $result = curl_exec($ch);
    $err = curl_error($ch);
    $result = json_decode($result, true);
    curl_close($ch);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return view('checkout', [
            'resault' => $result["Status"]
        ]);    
    }
});
Auth::routes();