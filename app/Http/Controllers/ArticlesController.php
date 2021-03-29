<?php

namespace App\Http\Controllers;

use App\Models\articles;


class ArticlesController extends Controller
{
    public function index()
    {
        /*
        * Le envía como variables articles que contiene la lista de artículos
        * a la vista articles.index
        */
        $articles = articles::paginate(10);
        return view('articles.index', compact('articles'));
    }
    public function getArticles()
    {
        /*
        * Devuelve la lista de artículos paginados de a 10
        */
        $articles = articles::simplePaginate(10);
        return response()->json(compact('articles'));
    }
}
