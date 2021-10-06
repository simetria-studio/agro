<?php

namespace App\Http\Controllers\Adress;

use App\Models\AdressBuyer;
use App\Models\ShippingTax;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app-front.store.pages.adress-edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function buscaCep(Request $request)
    {

        $valor = $request->search;
        $cep = str_replace('-', '', $valor);

        $url2 = Http::get("https://viacep.com.br/ws/$cep/json/");
        // $dadosFirst = str_replace('<i>Desconhecido</i>', '"false"', $url->body());
        // $dadosFirst = str_replace(' ,', '"false",', $dadosFirst);
        // $dadosFirst = json_decode($dadosFirst);

        // if($dadosFirst){
        //     if($dadosFirst->Latitude !== 'false' && $dadosFirst->Longitude !== 'false'){
        //         return response()->json($dadosFirst);
        //     }
        // }

        $url = Http::get('https://maps.google.com/maps/api/geocode/json?address='.$cep.'&sensor=false&key=AIzaSyCcTnukB7zVZVr3T-Pk6-Lptswge0BDOXg');
        $google = json_decode($url->collect());
        $api = json_decode($url2->collect());
        $dados = [
            'Cep' => $api->cep,
            'Rua' => $api->logradouro,
            'Bairro' => $api->bairro,
            'Cidade' => $api->localidade,
            'Estado' => $api->uf,
            'Latitude' => $google->results[0]->geometry->location->lat,
            'Longitude' => $google->results[0]->geometry->location->lng,
        ];


        return response()->json($dados);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $url = Http::get("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=41.183,-8.67977&destinations=$request->latitude,$request->longitude&key=AIzaSyCcTnukB7zVZVr3T-Pk6-Lptswge0BDOXg");

        $collection = collect(json_decode($url, true));

        $dist = $collection['rows'][0]['elements'][0]['distance']['text'];
        $distF = (float)$dist;
        $distC = $distF;

        $shipValue = ShippingTax::create([
            'user_id' => auth()->user()->id,
            'value' => $distC,
        ]);

        $adress = AdressBuyer::create($request->all());
        if(\Cart::isEmpty()){
            return redirect()->route('store.index')->with('success', 'Endereço Salvo');
        }else{
            return redirect()->route('store.checkout')->with('success', 'Endereço Salvo');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
