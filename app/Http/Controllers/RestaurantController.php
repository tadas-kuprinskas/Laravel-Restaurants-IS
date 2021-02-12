<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if (isset($request->menu_id) && $request->menu_id !== 0) {
            $restaurants = \App\Models\Restaurant::where('menu_id', $request->menu_id)->orderBy('title')->get();

        } elseif (isset($request->search)) {
            $restaurants = \App\Models\Restaurant::where('title', $request->search)->orderBy('title')->get();

        } else {
            $restaurants = \App\Models\Restaurant::orderBy('title')->get();
        }

        $menus = \App\Models\Menu::orderBy('title')->get();
        return view('restaurant.index', ['restaurants' => $restaurants, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $menus = \App\Models\Menu::orderBy('title')->get();
        return view('restaurant.create', ['menus' => $menus]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'customers' => 'required',
            'employees' => 'required',
        ]);

        $restaurant = new Restaurant();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurant.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus = \App\Models\Menu::orderBy('title')->get();
        return view('restaurant.edit', ['restaurant' => $restaurant, 'menus' => $menus]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {

        $request->validate([
            'title' => 'required',
            'customers' => 'required',
            'employees' => 'required',
        ]);

        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurant.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, Request $request)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index', ['menu_id'=> $request->input('menu_id')]);
    }

    public function details($id){
        $restaurant = Restaurant::find($id);
        return view('restaurant.details', ['restaurant' => $restaurant]);
    }

}
