<?php
namespace App\Decorators;

use Shopify\Clients\Graphql as ClientsGraphql;
use App\Exceptions\ShopifyPermissionDenyException;

class Graphql extends ClientsGraphql{

    private $shopify_client;

    public function __construct(
        string $domain,
        ?string $token = null
    ) {
        $this->shopify_client = new ClientsGraphql($domain, $token);
    }

    public function graphCall(
        $data,
        array $query = [],
        array $extraHeaders = [],
        ?int $tries = null
    ): array {
        $parent_response = $this->shopify_client->query(
            $data,
            $query,
            $extraHeaders,
            $tries
        );

        $response = json_decode($parent_response->getBody()->getContents(), true);

        if(isset($response['errors'])){
            if(is_array($response['errors']) and in_array('ACCESS_DENIED', array_column(array_column($response['errors'], 'extensions'), 'code')) ){
                throw new ShopifyPermissionDenyException();
            }
        }

        return $response;
    }
}