<?php

namespace App\Http\Controllers;

use App\DataTables\PointDataTable;
use App\Http\Requests\PointCreateRequest;
use App\Models\Point;
use Illuminate\Contracts\View\View;

class PointController extends Controller
{
    private $point;

    public function __construct(Point $point)
    {
        $this->point = $point;
    }

    public function index(PointDataTable $dataTable)
    {
        return $dataTable->render('admin.points.index');
    }

    public function create(Point $point) : View
    {
        return view('admin.points.create',compact('point'));
    }

    public function edit(Point $point) : View
    {
        return view('admin.points.edit', compact('point'));
    }

    public function destroy(Point $point)
    {
        try {
            $point->delete();
            return  response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong']);
        }
    }

    public function store(PointCreateRequest $request)
    {
        $validateData = $request->validated();
        try {
            $this->point->points = $validateData['points'];
            $this->point->purchase_amount = $validateData['purchase_amount'];
            $this->point->bonus_points = $validateData['bonus_points'];
            $this->point->save();

            return to_route('admin.point.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error creating the category.');
        }
    }

    public function update(PointCreateRequest $request, Point $point)
    {
        $validateData = $request->validated();
        try {
            $this->point->points = $validateData['points'];
            $this->point->purchase_amount = $validateData['purchase_amount'];
            $this->point->bonus_points = $validateData['bonus_points'];
            $this->point->save();

            return to_route('admin.point.index')->with('success', 'Category Updated successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error updating the category.');
        }
    }

}
