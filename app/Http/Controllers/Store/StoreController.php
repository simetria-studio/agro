<?php

namespace App\Http\Controllers\Store;

use App\Models\Porto;
use App\Models\Produto;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Especie;
use App\Models\SellingToCity;

class StoreController extends Controller
{



    public function index()
    {
        return view('app-front.store.pages.home');
    }

    public function porto()
    {
        $portos = Porto::where('status', 0)->get();
        return view('app-front.store.pages.porto', compact('portos'));
    }

    public function produtos($id)
    {
        $produtos = Produto::with('cidade')->whereHas('cidade',function($query) use ($id){
            return $query->where('cidade_id', $id);
        })->get();
        $porto = Porto::find($id);
        session(['cidade_id' => $id]);
        session(['cidade' => $porto->nome]);
        session(['sigla' => $porto->sigla]);
        $especies = Especie::all();
        return view('app-front.store.pages.produtos', compact('produtos', 'porto', 'especies'));
    }

    public function produto($id)
    {
        $produto = Produto::with('especies', 'cidade')->find($id);
        $cidade_id = session()->get('cidade_id');
        $sigla = session()->get('sigla');
        $cidade = session()->get('cidade');
        return view('app-front.store.pages.produto-single', get_defined_vars());
    }
    public function produtoInfo($id)
    {
        $produto = Produto::with('especies')->find($id);
        return view('store.pages.painel.info-produto', compact('produto'));
    }

    public function portoSearch(Request $request)
    {
        if ($request->ajax()) {
            $portos = '';
            $portos = DB::table('portos')->where('nome', 'LIKE', '%' . $request->search . "%")->get();


            return response()->json($portos);
        }
    }

    public function produtoSearch(Request $request)
    {
        // $porto = Porto::find($id);
        $produtos = $request->except('_token');
        $especies = Especie::all();
        $produtos = '';
        $query = Produto::query();


        $termos = $request->only('especie_id', 'tamanho', 'arte');

        foreach ($termos as $nome => $valor) {
            if ($valor) {
                $query->where($nome, 'LIKE', '%' . $valor . '%');
            }
        }


        $produtos = $query->get();

        // dd($produtos);
        // return response()->json($portos);
        return view('store.pages.painel.produtos-filter', compact('produtos', 'especies'));
    }
}
