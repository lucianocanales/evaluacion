<?php

namespace App\Http\Controllers;

use App\Models\HistoriInventories;
use App\Models\articles;
use Illuminate\Http\Request;

class HistoriInventoriesController extends Controller
{
    public function index($pk)
    {
        /*
        * Le envía como variables hitorial que contiene la lista de movimientos históricos
        * y article que contiene el artículo con id = $pk a la vista articles.show
        */
        $article = articles::find($pk);
        $hitorial = HistoriInventories::where('article_id', $pk)->paginate(10);
        return view('articles.show', compact('hitorial', 'article'));
    }
    public function getHistorial($pk)
    {
        /*
        * Devuelve la lista de movimientos históricos del artículo con id = $pk paginados de a 10
        */
        $hitorial = HistoriInventories::where('article_id', $pk)->simplePaginate(10);
        return response()->json(compact('hitorial'));
    }

    public function buyArticle(Request $request)
    {
        /*
        * Crea un registro en la tabla HistoriInventories, y le asigna la suma entre
        * $article->inventario + $historial->amount a el atributo inventario del artículo
        * con id article_id
        */
        $historial = new HistoriInventories;
        $article = articles::find($request->article_id);
        $historial->amount = $request->amount;
        $historial->date = $request->date;
        $historial->type = 'compra';
        $historial->article_id = $request->article_id;
        $article->inventario = $article->inventario + $historial->amount;
        $result_historial = $historial->save();
        $result_article = $article->save();
        if ($result_article && $result_historial) {
            return response()->json(['Result' => 'Article Buy'], 201);
        } else {
            return response()->json(['Result' => 'Bad Request'], 400);
        };
    }

    public function sellArticle(Request $request)
    {
        /*
        * Crea un registro en la tabla HistoriInventories, y le asigna la resta entre
        * $article->inventario - $historial->amount a el atributo inventario del artículo
        * con id article_id
        */
        $historial = new HistoriInventories;
        $article = articles::find($request->article_id);
        $historial->amount = $request->amount;
        $historial->date = $request->date;
        $historial->type = 'venta';
        $historial->article_id = $request->article_id;
        $article->inventario = $article->inventario - $historial->amount;
        $result_historial = $historial->save();
        $result_article = $article->save();
        if ($result_article && $result_historial) {
            return response()->json(['Result' => 'Article Sell'], 201);
        } else {
            return response()->json(['Result' => 'Bad Request'], 400);
        };
    }

    public function countArticle(Request $request)
    {
        /*
        * Crea un registro en la tabla HistoriInventories, y le asigna el valor de amount
        * al inventario del artículo indicado en el article_id
        */
        $historial = new HistoriInventories;
        $article = articles::find($request->article_id);
        $historial->amount = $request->amount;
        $historial->date = $request->date;
        $historial->type = 'recuento';
        $historial->article_id = $request->article_id;
        $article->inventario =  $historial->amount;
        $result_historial = $historial->save();
        $result_article = $article->save();
        if ($result_article && $result_historial) {
            return response()->json(['Result' => 'Article Count'], 201);
        } else {
            return response()->json(['Result' => 'Bad Request'], 400);
        };
    }
}
