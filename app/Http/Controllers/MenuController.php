<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('menu.index', ['menus' => Menu::orderBy('title')->get()]);
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('menu.create');
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'amount_of_meat' => 'required',
            'about' => 'required',
        ]);

        $menu = new Menu();
     // can be used for seeing the insides of the incoming request
         // dd($request->all()); die();
        $menu->fill($request->all());
        $menu->save();
        return redirect()->route('menu.index');
    }
 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu){
        return view('menu.edit', ['menu' => $menu]);
    }
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu){

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'amount_of_meat' => 'required',
            'about' => 'required',
        ]);
        $menu->fill($request->all());
        $menu->save();
        return redirect()->route('menu.index');
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu){
        $menu->delete();
        return redirect()->route('menu.index');
    }

}
