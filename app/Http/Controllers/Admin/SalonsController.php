<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Salons;
use Illuminate\Http\Request;

class SalonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $salons = Salons::where('name_salon', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $salons = Salons::latest()->paginate($perPage);
        }

        return view('admin.salons.index', compact('salons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Cities::all()->pluck('name_city', 'id')->toArray();

        return view('admin.salons.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name_salon' => 'required',
            'city_id' => 'required',
            'address' => 'required',
        ];

        $request->validate($rules);
        Salons::create($request->all());
        flash('Салон успешно добавлен!')->success()->important();
        return redirect(route('salons.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cities = Cities::all()->pluck('name_city', 'id')->toArray();
        $salon = Salons::findOrFail($id);
        return view('admin.salons.show', compact('salon', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = Cities::all()->pluck('name_city', 'id')->toArray();
        $salon = Salons::findOrFail($id);
        return view('admin.salons.edit', compact('salon', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name_salon' => 'required',
            'city_id' => 'required',
            'address' => 'required',
        ];

        $request->validate($rules);
        Salons::findOrFail($id)->update($request->all());
        flash('Салон успешно обновлен!')->warning()->important();
        return redirect(route('salons.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Salons::destroy($id);

        flash('Салон удален!')->error()->important();
        return redirect('admin/salons');
    }
}
