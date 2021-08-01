<?php

namespace App\Jobs;

use Log;
use App\Models\Content;
use App\Repositories\Interfaces\ContentRepositoryInterface;
use App\Services\Interfaces\WebCrawlerServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseContentData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(WebCrawlerServiceInterface $webCrawlerService, ContentRepositoryInterface $contentRepository)
    {
        try {
            $webCrawlerService->request('GET', $this->content->url);
            $webCrawlerService->filter();
            $filteredData = $webCrawlerService->getFilteredData();
            \Log::debug($filteredData);
            $contentRepository->createDataMany($this->content->id, $filteredData);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}
