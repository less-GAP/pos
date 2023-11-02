<?php


namespace Modules\Salon\Actions\DataSource;


use Illuminate\Http\Request;
use Modules\Salon\Services\CrawlerService;

class TestPostUrlAction
{
    public function handle(Request $request)
    {
        $data = $request->input('data');
        $service = app(CrawlerService::class);
        $crawler = $service->initDomCrawler($request->input('url'), $data);
        $result= $service->filterXPath($crawler, $data['rule_detect_post_link']);
        return  $service->listText($result);
    }
}
