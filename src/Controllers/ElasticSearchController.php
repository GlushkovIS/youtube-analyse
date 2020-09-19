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

    /**
     * @param array $params
     * @return array|callable
     */
    public function addDocument(array $params)
    {
        return $this->elasticSearch->index($params);
    }

    /**
     * @param array $params
     * @return array|callable
     */
    public function getDocument(array $params)
    {
        return $this->elasticSearch->get($params);
    }

    /**
     * @param array $params
     * @return array|callable
     */
    public function searchDocument(array $params)
    {
        return $this->elasticSearch->search($params);
    }

    /**
     * @param array $params
     * @return array|callable
     */
    public function deleteDocument(array $params)
    {
        return $this->elasticSearch->delete($params);
    }

    public function getNumberDocInIndex(string $index)
    {
        return $this->elasticSearch->count([
            'index' => $index
        ]);
    }
}
