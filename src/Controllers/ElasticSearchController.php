<?php

namespace Controllers;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

class ElasticSearchController
{
    /** @var Client */
    public Client $elasticSearch;

    public function __construct()
    {
        $this->elasticSearch = ClientBuilder::create()->build();
    }

    public function addDocument()
    {
        $params = [
            'index' => 'my_index',
            'id' => 'my_id',
            'body' => ['testField' => 'abc']
        ];

        $response = $this->elasticSearch->index($params);
        print_r($response);
    }

    public function getDocument()
    {
        $params = [
            'index' => 'my_index',
            'id'    => 'my_id'
        ];

        $response = $this->elasticSearch->get($params);
        print_r($response);
    }

    public function searchDocument()
    {
        $params = [
            'index' => 'my_index',
            'body'  => [
                'query' => [
                    'match' => [
                        'testField' => 'abc'
                    ]
                ]
            ]
        ];

        $response = $this->elasticSearch->search($params);
        print_r($response);
    }

    public function deleteDocument()
    {
        $params = [
            'index' => 'my_index',
            'id'    => 'my_id'
        ];

        $response = $this->elasticSearch->delete($params);
        print_r($response);
    }
}
