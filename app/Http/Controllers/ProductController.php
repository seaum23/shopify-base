<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify\Clients\Graphql;

class ProductController extends Controller
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
                products (first: 10) {
                    edges {
                        node {
                            id
                            title
                            descriptionHtml
                        }
                    }
                }
            }
        QUERY;
        $response = $client->query(data: $queryString);

        return response($response->getBody())
        ->header('Content-Type', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Graphql($request->user->shop, $request->user->token);

        $queryUsingVariables = <<<QUERY
            mutation productCreate(\$input: ProductInput!) {
                productCreate(input: \$input) {
                    product {
                        id
                    }
                }
            }
        QUERY;

        $variables = [
            "input" => [
                ["title" => "TARDIS"],
                ["descriptionHtml" => "Time and Relative Dimensions in Space"],
                ["productType" => "Time Lord technology"]
            ]
        ];

        $response = $client->query(data: ['query' => $queryUsingVariables, 'variables' => $variables]);

        return response($response->getBody(), $response->getStatusCode())
        ->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $product_id)
    {
        $client = new Graphql($request->user->shop, $request->user->token);

        // Use `query` method and pass your query as `data`
        $queryString = <<<QUERY
            {
                product(id: "gid://shopify/Product/$product_id") {
                    title
                    description
                    onlineStoreUrl
                }
            }
        QUERY;

        $response = $client->query(data: $queryString);

        return response($response->getBody())
        ->header('Content-Type', 'application/json');
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
