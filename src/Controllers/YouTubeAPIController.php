<?php

namespace Controllers;

use Exceptions\RestClientException;
use Model\YouTubeChannelModel;

class YouTubeAPIController
{
    protected RestAPIController $youtubeAPI;
    private string $apiKey;

    public function __construct()
    {
        $this->youtubeAPI = new RestAPIController([
            'base_url' => "https://www.googleapis.com/youtube/v3"
        ]);
        $this->apiKey = $_ENV['YOUTUBE_API_KEY'];
    }

    /**
     * @param string $channelName
     * @return YouTubeChannelModel|null
     * @throws RestClientException
     */
    public function getYoutubeChannelData(string $channelName): ?YouTubeChannelModel
    {
        $result = $this->youtubeAPI->get('channels', [
            'part' => 'statistics',
            'key' => $this->apiKey,
            'forUsername' => $channelName
        ]);

        if ($result->info->http_code == 200) {
            $resultObj = $result->decode_response();
            $resultObj->items[0]->statistics->viewCount;

            return (new YouTubeChannelModel())
                ->setName($channelName)
                ->setViews($resultObj->items[0]->statistics->viewCount)
                ->setCountVideo($resultObj->items[0]->statistics->videoCount);
        }
    }
}
