<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreRestaurantRequest;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::owned(Auth::id())->orderBy('name', 'asc')->get();

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type != 'admin' & Auth::user()->type != 'owner'){
            Session::flash('failure', 'El usuario no tiene permisos para crear restaurantes.');

            return redirect(route('home'));
        }

        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');

        return view('restaurants.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $input =$request->all();

        /*$validated = $request->validate([
            'name'          => 'required|string|min:5|max:50',
            'description'   => 'required|string|min:10',
            'city'          => 'required|min:5|max:30',
            'phone'         => 'required|alpha_dash|min:10|max:50',
            'category_id'   => 'required|exists:categories,id',
            'delivery'      => [
                'required',
                Rule::in(['y', 'n']),
            ],
        ]);*/

        $restaurant = new Restaurant();
        $restaurant-> fill($input);
        $restaurant-> user_id = Auth::id();
        $restaurant-> save();

        Session::flash('success', 'Restaurante Agregado Exitosamente');

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show',compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');

        return view('restaurants.edit',compact('categories', 'restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRestaurantRequest $request, Restaurant $restaurant)
    {
        $input =$request->all();

        //TODO Validar

        $restaurant-> fill($input);
        $restaurant-> user_id = Auth::id();
        $restaurant-> save();

        Session::flash('success', 'Restaurante Editado Exitosamente');

        return redirect(route('restaurants.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant -> delete();

        Session::flash('success', 'Restaurante Removido Exitosamente');

        return redirect(route('restaurants.index'));
    }

    public function showFrontPage(Request $request)
    {        
        $filter = $request['filter'] ?? null;

        if(!isset($request['filter'])){
            $restaurants = Restaurant::orderBy('name', 'asc')->Paginate(8);
        }else{
            $restaurants = Restaurant::orderBy('name', 'asc')->where('category_id', '=', $request['filter'])->Paginate(8);
            $restaurants->appends(['filter' => $filter]);
        }
            
        $categories = Category::orderBy('name', 'asc')->pluck('name','id');

        //$restaurantsOwner1 = Restaurant::where('user_id', '=', '1') -> orderBy('name', 'asc')-> get(); //Traer todos los restaurantes de un usuario o owner puntual

        return view('front_page.index', compact('restaurants','categories','filter'));
    }
}
