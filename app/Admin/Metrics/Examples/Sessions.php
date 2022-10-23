<?php

namespace App\Admin\Metrics\Examples;

use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Metrics\Bar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class Sessions extends Bar
{
    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $color = Admin::color();

        $dark35 = $color->dark35();

        // 卡片内容宽度
        $this->contentWidth(5, 7);
        // 标题
        $this->title('收入');
        // 设置下拉选项
        $this->dropdown([
            '7' => 'Last 7 Days',
            'today' => '今天',
            '30' => 'Last Month',
        ]);
        // 设置图表颜色
        $this->chartColors([
            $dark35,
            $dark35,
            $color->primary(),
            $dark35,
            $dark35,
            $dark35
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
        $endTime = Carbon::now();
        switch ($request->get('option')) {
            case '7':
                $startTime = Carbon::now()->subDays(7);
                break;
            case '30':
                $startTime = Carbon::now()->subDays(30);
                break;
            case 'today':
                $startTime = Carbon::today();
                break;
            default:
                $startTime =  Carbon::now()->subDays(7);
        }

        $orderGroup = Order::query()
            ->where('created_at', '>=', $startTime)
            ->where('created_at', '<=', $endTime)
            ->where('status', '=' ,Order::STATUS_COMPLETED)
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(price) as price'))
            ->groupBy('date')
            ->pluck('price')
            ->toArray();
        $totalPrice = array_sum($orderGroup);

        // 卡片内容
        $this->withContent($totalPrice.'$', '+5.2%');

        // 图表数据
        $this->withChart([
            [
                'name' => '订单金额',
                'data' =>  $orderGroup,
            ],
        ]);
    }

    /**
     * 设置图表数据.
     *
     * @param array $data
     *
     * @return $this
     */
    public function withChart(array $data)
    {
        return $this->chart([
            'series' => $data,
        ]);
    }

    /**
     * 设置卡片内容.
     *
     * @param string $title
     * @param string $value
     * @param string $style
     *
     * @return $this
     */
    public function withContent($title, $value, $style = 'success')
    {
        // 根据选项显示
        $label = strtolower(
            $this->dropdown[request()->option] ?? 'last 7 days'
        );

        $minHeight = '183px';

        return $this->content(
            <<<HTML
<div class="d-flex p-1 flex-column justify-content-between" style="padding-top: 0;width: 100%;height: 100%;min-height: {$minHeight}">
    <div class="text-left">
        <h1 class="font-lg-2 mt-2 mb-0">{$title}</h1>
        <h5 class="font-medium-2" style="margin-top: 10px;">
            <span class="text-{$style}">{$value} </span>
            <span>vs {$label}</span>
        </h5>
    </div>

    <a href="#" class="btn btn-primary shadow waves-effect waves-light">View Details <i class="feather icon-chevrons-right"></i></a>
</div>
HTML
        );
    }
}
