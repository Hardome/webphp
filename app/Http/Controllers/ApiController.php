<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsClassResource;
use App\Http\Resources\NewsClassResourceCollection;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    public function list()
    {
        $newsCollections =  new NewsClassResourceCollection(News::all());

        //->header('Content-Type', 'application/json; charset=UTF-8');
        return Response::json($newsCollections);
    }

    public function statya($id)
    {
        $newsCollections =  new NewsClassResource(News::findOrFail($id));

        return Response::json($newsCollections);
    }
}
