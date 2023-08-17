<?php

use Shopify\Context;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Shopify\Auth\OAuth;
use Illuminate\Http\Request;
use Shopify\Auth\OAuthCookie;
use Shopify\Auth\FileSessionStorage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Storage;

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

Route::get('test', function(){
    var_dump(parse_url(config('app.url'))); 
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index')->middleware('shopify.merchant');

Route::get('/', [AuthController::class, 'index'])->name('app.install');
Route::get('/authenticate', [AuthController::class, 'store'])->name('app.authenticate');

// Route::get('/create_jwt', function(){
//     $jwt = JWT::encode(['name' => 'shopify'], Storage::get('jwt/jwtRS256.key'), 'RS256');
//     echo "Encode:\n" . print_r($jwt, true) . "\n";
// });


// Route::get('product', function(Request $request){
    
//     // dd(Cookie::get(), session()->all());
//     // $requestHeaders = array( 
//     //     'api_version' => '2023-01', 
//     //     'X-Shopify-Access-Token' => 'ACCESS_TOKEN'
//     //  );
//     // Load current session to get `accessToken`
//     // $session = Shopify\Utils::loadCurrentSession($request->header(), Cookie::get(), true);

//     // $session = OAuth::callback(
//     //     Cookie::get(),
//     //     $request->only('code', 'hmac', 'host', 'shop', 'state', 'timestamp'),
//     //     // $request->all(),
//     //     function(OAuthCookie $cookie) {
//     //         Cookie::queue(
//     //             $cookie->getName(),
//     //             $cookie->getValue(),
//     //             $cookie->getExpire() ? ceil(($cookie->getExpire() - time()) / 60) : null,
//     //             '/',
//     //             'aff6-115-127-46-145.ngrok-free.app',
//     //             $cookie->isSecure(),
//     //             $cookie->isHttpOnly(),
//     //             false,
//     //             'Lax'
//     //         );
//     //         return true;
//     //     }
//     // );
//     // Create GraphQL client
//     $client = new Shopify\Clients\Graphql($request->shop, $request->bearerToken());
//     // Use `query` method and pass your query as `data`
//     $queryString = <<<QUERY
//         {
//             products (first: 10) {
//                 edges {
//                     node {
//                         id
//                         title
//                         descriptionHtml
//                     }
//                 }
//             }
//         }
//     QUERY;
//     $response = $client->query(data: $queryString);

//     echo $response->getBody();
// });
