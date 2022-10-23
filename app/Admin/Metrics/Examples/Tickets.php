<?php

namespace App\Admin\Metrics\Examples;

use App\Models\Order;
use Carbon\Carbon;
use Dcat\Admin\Widgets\Metrics\RadialBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tickets extends RadialBar
{
    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $this->title('订单');
        $this->height(400);
        $this->chartHeight(300);
        $this->chartLabels('转化率');
        $this->dropdown([
            'today' => '今天',
            '7' => 'Last 7 Days',
            '30' => 'Last Month',
           
        ]);
    }

    /**
     * 处理请求
     *
     * @param Request $request
     *
     * @return mixed|void
     */
    public function handle(Request $request)
    {
        $endtime = Carbon::now();
        switch ($request->get('option')) {
            case '7':
                $startTime = Carbon::now()->subDays(7);
                break;
            case '30':
                $startTime = Carbon::now()->subDays(30);
                break;

            case 'todday':
            default:
                $startTime = Carbon::today();
        }

        $order = Order::query()
            ->where('created_at', '>=', $startTime)
            ->where('created_at', '<=', $endtime)
            ->select('status', DB::raw('count(id) as num'))
            ->groupBy('status')
            ->pluck('num', 'status')
            ->toArray();

        $completed = $order[Order::STATUS_COMPLETED] ?? 0;





        $orderCount = array_sum($order);
        if ($orderCount == 0) {
            $successRate = 0;
        } else {
            $rate = bcdiv($completed, $orderCount, 2);
            $successRate = bcmul($rate, 100);
        }
        // 卡片内容
        $this->withContent($orderCount);
        // 卡片底部
        $this->withFooter($completed, 63, '1d');
        // 图表数据
        $this->withChart($successRate);
    }

    /**
     * 设置图表数据.
     *
     * @param int $data
     *
     * @return $this
     */
    public function withChart(int $data)
    {
        return $this->chart([
            'series' => [$data],
        ]);
    }

    /**
     * 卡片内容
     *
     * @param string $content
     *
     * @return $this
     */
    public function withContent($content)
    {
        return $this->content(
            <<<HTML
<div class="d-flex flex-column flex-wrap text-center">
    <h1 class="font-lg-2 mt-2 mb-0">{$content}</h1>
    <small>订单总数</small>
</div>
HTML
        );
    }

    /**
     * 卡片底部内容.
     *
     * @param string $new
     * @param string $open
     * @param string $response
     *
     * @return $this
     */
    public function withFooter($new, $open, $response)
    {
        return $this->footer(
            <<<HTML
<div class="d-flex justify-content-between p-1" style="padding-top: 0!important;">
    <div class="text-center">
        <p>已完成订单</p>
        <span class="font-lg-1">{$new}</span>
    </div>
    <div class="text-center">
        <p>Open Tickets</p>
        <span class="font-lg-1">{$open}</span>
    </div>
    <div class="text-center">
        <p>Response Time</p>
        <span class="font-lg-1">{$response}</span>
    </div>
</div>
HTML
        );
    }
}
