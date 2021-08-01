<?php

namespace App\Services;

use Goutte;
use App\Services\Interfaces\WebCrawlerServiceInterface;

class WebCrawlerService implements WebCrawlerServiceInterface
{
    private $crawler;
    private $filteredData = [];

    public function __construct()
    {
    }

    public function getFilteredData(): array
    {
        return $this->filteredData;
    }

    public function request(string $requestType, string $requestUrl)
    {
        $this->crawler = Goutte::request($requestType, $requestUrl);
    }

    public function filter()
    {
        $filteredData = [];
        $this->crawler->filter('h1,h2,[class*=excerpt],img')->each(function ($node) use (&$filteredData) {
            $nodeType = $this->nodeType($node->nodeName());
            $nodeContent = $this->nodeContent($nodeType, $node);
            $filteredData[] = [
                'type' => $nodeType,
                'value' => $nodeContent
            ];
        });
        $this->filteredData = $filteredData;
    }

    private function nodeType($nodeName)
    {
        switch ($nodeName) {
            case 'h1':
                return 'title';
                break;
            case 'h2':
                return 'subtitle';
                break;
            case 'img':
                return 'image';
                break;
            default:
                return 'excerpt';
                break;
        }
    }

    private function nodeContent($nodeName, $node){
        switch ($nodeName) {
            case 'title':
                return $node->text();
                break;
            case 'subtitle':
                return $node->text();
                break;
            case 'image':
                return $node->image()->getUri();
                break;
            default:
                return $node->text();
                break;
        }
    }
}
