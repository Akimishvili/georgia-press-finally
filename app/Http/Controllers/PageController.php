<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\App;
use App\Models\Article;
use App\Models\Block;
use App\Models\Category;



class PageController extends Controller
{
    public function home(Request $request)
    {
        $allArticles = Article::where('visibility', '1') -> with('categories') -> orderBy('date', 'DESC')->paginate(9);
        if($request -> filled('search')){
            $allArticles = Article::where('title', 'like', '%'.$request -> search.'%')->
            orWhere('description', 'like', '%'.$request -> search.'%')
                ->where('visibility', '1')
                ->paginate(9);

        }
        $categories = Category::all();
        $articles = Article::with('categories') -> get();

        //TODO: social category with articles
        $socialCategory = $categories -> first(fn($category) => $category -> id == 1);
        $social = $articles->where('visibility', '1')->filter(fn($article) => $article->categories->contains('id', $socialCategory -> id));

        //TODO: world category with articles
        $worldCategory = $categories -> first(fn($category) => $category -> id == 2);
        $world = $articles->where('visibility', '1')->filter(fn($article) => $article->categories->contains('id', $worldCategory -> id));

        //TODO: economy category with articles
        $economyCategory = $categories -> first(fn($category) => $category -> id == 3);
        $economy = $articles->where('visibility', '1')->filter(fn($article) => $article->categories->contains('id', $economyCategory -> id));

        //TODO: green category with articles
        $greenCategory = $categories -> first(fn($category) => $category -> id == 4);
        $green = $articles->where('visibility', '1')->filter(fn($article) => $article->categories->contains('id', $greenCategory -> id));

        //TODO: animal category with articles
        $animalCategory = $categories -> first(fn($category) => $category -> id == 5);
        $animal = $articles->where('visibility', '1')->filter(fn($article) => $article->categories->contains('id', $animalCategory -> id));

        //TODO: tourism category with articles
        $tourismCategory = $categories -> first(fn($category) => $category -> id == 6);
        $tourism = $articles->where('visibility', '1')->filter(fn($article) => $article->categories->contains('id', $tourismCategory -> id));

        //TODO: sport category with articles
        $sportCategory = $categories -> first(fn($category) => $category -> id == 7);
        $sport = $articles->where('visibility', '1')->filter(fn($article) => $article->categories->contains('id', $sportCategory -> id));

        //TODO: youth category with articles
        $youthCategory = $categories -> first(fn($category) => $category -> id == 8);
        $youth = $articles->where('visibility', '1')->filter(fn($article) => $article->categories->contains('id', $youthCategory -> id));

        //TODO: culture category with articles
        $cultureCategory = $categories -> first(fn($category) => $category -> id == 9);
        $culture = $articles->where('visibility', '1')->filter(fn($article) => $article->categories->contains('id', $cultureCategory -> id));

        return view('pages.home',[
            'language' => App::getLocale(),
            'articles' => $allArticles,
            'socialCategory' => $socialCategory,
            'social' => $social,
            'sportCategory' => $sportCategory,
            'sport' => $sport,
            'worldCategory' => $worldCategory,
            'world' => $world,
            'economyCategory' => $economyCategory,
            'economy' => $economy,
            'greenCategory' => $greenCategory,
            'green' => $green,
            'animalCategory' => $animalCategory,
            'animal' => $animal,
            'tourismCategory' => $tourismCategory,
            'tourism' => $tourism,
            'youthCategory' => $youthCategory,
            'youth' => $youth,
            'cultureCategory' => $cultureCategory,
            'culture' => $culture,
            'blocks' => Block::whereNotNull('video')->with('article')->get()
        ]);
    }

    public function category(string $language, string $category)
    {
        $mainCategory = Category::where('id', $category) -> first();
         if(!$mainCategory) abort(404);
        $articles = $mainCategory->load(['articles' => function ($query) {
            $query->where('visibility', '1')->orderBy('date', 'DESC');
        }]);

        return view('pages.category', [
            'language' => App::getLocale(),
            'category' => $mainCategory,
            'articles' => $articles
        ]);
    }

    public function section(string $language, Section $section)
    {
        return view('pages.section',[
            'language' => App::getLocale(),
            'section' => $section->load('articles')
        ]);
    }


    public function videos(Block $block)
    {
        $blocks = Block::whereNotNull('video') ->with('article')-> paginate(12);
        return view('pages.video', [
            'language' => App::getLocale(),
            'blocks' => $blocks
        ]);
    }
    public function author(string $language, Author $author)
    {
        $articles = $author -> articles() -> where('visibility', '1') ->paginate(9);
        return view('pages.author',[
           'language' => $language,
           'author' => $author,
           'articles' => $articles
        ]);
    }
}
