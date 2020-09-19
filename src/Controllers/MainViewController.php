<?php

require_once 'bootstrap/app.php';

use Controllers\MainController;

$mainController = new MainController();
$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['PWD']);

$dotenv->required('YOUTUBE_API_KEY');
$dotenv->load();

if (isset($_POST['nameChannel'])) {
    $nameChannel = htmlspecialchars($_POST['nameChannel']);
    try {
        $mainController->getYoutubeDataAndSave($nameChannel);
    } catch (\Exceptions\RestClientException $e) {
    }
}

echo '<pre>';
echo $mainController->showAllYoutubeChannelsStat();
