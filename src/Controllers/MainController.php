<?php

namespace Controllers;

use Exceptions\RestClientException;

class MainController
{
    protected ElasticSearchController $es;

    public function __construct()
    {
        $this->es = new ElasticSearchController();
    }


    public function showAllYoutubeChannelsStat()
    {
        return $this->es->getDocument([
            'index' => 'youtubeChannel'
        ]);
    }

    /**
     * @param string $nameChannel
     * @throws RestClientException
     */
    public function getYoutubeDataAndSave(string $nameChannel): void
    {
        $youtubeChannelModel = (new YouTubeAPIController())->getYoutubeChannelData($nameChannel);
        if ($youtubeChannelModel !== null) {
            $youtubeChannelModel->saveToES();
        }
    }
}