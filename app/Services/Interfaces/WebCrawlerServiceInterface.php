<?php

namespace App\Services\Interfaces;

interface WebCrawlerServiceInterface
{
    public function getFilteredData(): array;

    public function request(string $requestType, string $requestUrl);

    public function filter();
}
