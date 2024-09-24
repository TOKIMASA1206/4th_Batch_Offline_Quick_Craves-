<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');

        //////売上データ//////
        $salesData = [
            'week' => [],
            'month' => [],
            'year' => []
        ];


        // 週ごとの売上を計算
        $salesData['week'] = DB::table('orders')
            ->select(DB::raw('WEEK(created_at) as week_number, SUM(grand_total) as total_sales'))
            ->whereYear('created_at', $currentYear)
            ->groupBy('week_number')
            ->orderBy('week_number')
            ->pluck('total_sales')
            ->toArray();

        // 月ごとの売上を計算
        $salesData['month'] = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month_number, SUM(grand_total) as total_sales'))
            ->whereYear('created_at', $currentYear)
            ->groupBy('month_number')
            ->orderBy('month_number')
            ->pluck('total_sales')
            ->toArray();

        // 年ごとの売上を計算
        $salesData['year'] = DB::table('orders')
            ->select(DB::raw('YEAR(created_at) as year_number, SUM(grand_total) as total_sales'))
            ->groupBy('year_number')
            ->orderBy('year_number')
            ->pluck('total_sales')
            ->toArray();

        // 各期間のデータが足りない場合は0を埋める
        $salesData['week'] = $this->fillMissingData($salesData['week'], 7);
        $salesData['month'] = $this->fillMissingData($salesData['month'], 12);
        $salesData['year'] = $this->fillMissingData($salesData['year'], 5);

        // 週ごとのオーダーからラベルを生成
        $weeks = DB::table('orders')
            ->select(DB::raw('WEEK(created_at) as week_number, DATE_FORMAT(MIN(created_at), "%Y-%m-%d") as week_date'))
            ->whereYear('created_at', $currentYear)
            ->groupBy('week_number')
            ->orderBy('week_number')
            ->pluck('week_date')
            ->toArray();

        // 月ごとのオーダーからラベルを生成
        $months = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month_number, MONTHNAME(MIN(created_at)) as month_name'))
            ->whereYear('created_at', $currentYear)
            ->groupBy('month_number')
            ->orderBy('month_number')
            ->pluck('month_name')
            ->toArray();

        // 年ごとのオーダーからラベルを生成
        $years = DB::table('orders')
            ->select(DB::raw('YEAR(created_at) as year_number'))
            ->groupBy('year_number')
            ->orderBy('year_number')
            ->pluck('year_number')
            ->toArray();

        // ラベルデータを追加
        $labelsData = [
            'week' => $weeks,
            'month' => $months,
            'year' => $years
        ];

        //////男女比円グラフ////

        $menCount = Profile::where('gender', 'male')->count();
        $womenCount = Profile::where('gender', 'female')->count();
        $othersCount = Profile::where('gender', 'other')->count();
        $totalCount = $menCount + $womenCount + $othersCount;

        $data = [
            'men' => $menCount,
            'women' => $womenCount,
            'others' => $othersCount,
        ];

        //////年齢別棒グラフ////

        $single = Profile::where('age', '<', 10)->count();
        $ten = Profile::where('age', '>=', 10)->where('age', '<', 20)->count();
        $twenty  = Profile::where('age', '>=', 20)->where('age', '<', 30)->count();
        $thirty = Profile::where('age', '>=', 30)->where('age', '<', 40)->count();
        $forty = Profile::where('age', '>=', 40)->where('age', '<', 50)->count();
        $fifty = Profile::where('age', '>=', 50)->where('age', '<', 60)->count();
        $sixty = Profile::where('age', '>=', 60)->where('age', '<', 70)->count();


        $ageGroups = [
            'single' => $single,
            'ten' => $ten,
            'twenty' => $twenty,
            'thirty' => $thirty,
            'forty' => $forty,
            'fifty' => $fifty,
            'sixty' => $sixty
        ];


        return view('admin.home.index', compact('salesData', 'data', 'ageGroups', 'salesData', 'labelsData'));
    }

    private function fillMissingData($data, $totalCount)
    {
        // 足りないデータを0で埋める関数
        return array_pad($data, $totalCount, 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
