<?php

namespace App\Http\Controllers;

use App\Decorators\Graphql;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Graphql($request->user->shop, $request->user->token);

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
