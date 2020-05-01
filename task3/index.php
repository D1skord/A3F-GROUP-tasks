<?php

// Для удобного просмотра
header('Content-Type: application/json');

require_once "HtmlParser.php";

$htmlParser = new HtmlParser('https://vinichenko-ivan.ru/');

print_r($htmlParser->getTags());