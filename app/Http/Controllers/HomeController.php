<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Shopify\Clients\Rest;
use App\Decorators\Graphql;
use App\Models\CronDetails;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function accTokenReverse($string, $length = 7)
    {

        $position = $length;

        $strlen =  strlen($string);

        $pos = $strlen - $length;

        list($beg_f, $end_f) = preg_split('/(?<=.{'.$pos.'})/', $string, 2);

        list($beg_l, $end_l) = preg_split('/(?<=.{'.$length.'})/', $beg_f, 2);

        return  'shpat_'.$end_l;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = CronDetails::find(262);
        $min = new Carbon("2023-08-12 00:00:00");
        $max = new Carbon("2023-08-21 23:59:59");

        // for($i = 0; $i <= 50; $i++){
            $client = new Rest($user->shop_url, $this->accTokenReverse($user->access_token));
            $response = $client->get(path: '/admin/api/2023-07/orders/count.json', query: [
                'created_at_min' => $min->toIso8601String(),
                'created_at_max' => $max->toIso8601String(),
                'status' => 'any'
            ]);
            $data = (string)$response->getBody();
            echo (string)$response->getBody();
        // }
        // return var_dump(json_decode((string)$response->getBody(), true));
        return;
        $client = new Graphql($user->shop, $user->token);

        // Use `query` method and pass your query as `data`
        $queryString = <<<QUERY
        {
            products(first:10){
              nodes{
                id
              }
            }
            inventoryItems(first:10){
              nodes{
                id
              }
            }
        }
        QUERY;
        $response = $client->graphCall(data: $queryString);

        return response($response)
        ->header('Content-Type', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
