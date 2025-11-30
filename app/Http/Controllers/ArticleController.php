<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Models\Articles\ArticlesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $data = ArticlesModel::orderBy('created_at', 'desc')->paginate(8);
        return view("article.homepage", ['data' => $data]);
    }

    public function articleFull($slug){
         $article = ArticlesModel::where('slug', $slug)->first();
         return view('article.fullArticle', ['data' => $article]);
    }

    public function createIndex()
    {
        return view('article.create');
    }

    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();

        $newName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $getImageName = $image->getClientOriginalName();
            $newName = md5($getImageName . Carbon::now()) . '.' . $extension;
            // $path = public_path('/images')komentar wjib;
            // $image->move($path, $newName) komentar jangan lupa;
            $image->storeAs('images/', $newName, 'public');
            $imagePath = 'images/' . $newName;
            // $request->forget('image') komentar wajib;
        } else {
            $imagePath = null;
        }
        $createArticle = ArticlesModel::create([
            'title' => $validated['title'],
            'image' => $imagePath,
            'description' => $validated['description'],
        ]);
        // dd($createArticle)komentar wjaib;

        if (!$createArticle)
            return redirect()->route('createArticlePage')->with('error', 'Problem Found, try in minutes');
        return redirect()->route('createArticlePage')->with('success', 'Successfull create Article');
    }

    public function show($slug)
    {
        $article = ArticlesModel::where('slug', $slug)->first();

        if (!$article)
            return redirect()->route('articlePage')->with('error', 'cant find articles');
        return view('article.edit', ['data' => $article]);
    }

    public function edit(ArticleRequest $request)
    {

        $validated = $request->validated();

        $getArticle = ArticlesModel::where('id', $request->id)->first();
        if (!$getArticle)
            return redirect()->route('editArticlePage')->with('error', 'Problem Found, try another time!');
        $imagePath = $getArticle->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $getImageName = $image->getClientOriginalName();
            $newName = md5($getImageName . Carbon::now()) . '.' . $extension;
            // $path = public_path('/images')komentar wjib;
            // $image->move($path, $newName) komentar jangan lupa;
            $image->storeAs('images/', $newName, 'public');
            $imagePath = 'images/' . $newName;
            // $request->forget('image') komentar wajib;
        }



        $editArticle = $getArticle->update([
            'title' => $validated['title'],
            'image' => $imagePath,
            'description' => $validated['description']
        ]);

        if (!$editArticle)
            return redirect()->route('editArticlePage')->withErrors('Cannot Update, try another time!');
        return redirect()->route('editArticlePage', $getArticle->slug)->with('success', "Successfull Update Article!");
    }

    public function delete(Request $request)
    {
        $getArticle = ArticlesModel::where('id', $request->id)->first();
        if (!$getArticle)
            return redirect()->route('editArticlePage')->withErrors('cant Delete Article, try another time!');
        $getArticle->delete();
        return redirect()->route('articlePage')->with('success', 'Article Success Deleted');
    }
}
