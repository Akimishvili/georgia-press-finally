<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => Article::orderBy('id', 'DESC')->paginate(6),
            'routeName' => Route::currentRouteName()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create',[
            'routeName' => Route::currentRouteName()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
//        $image = $request -> image;
//        $imageName = uniqid() . '-' . time() .'.'. $image -> extension(); // TODO: Generate new File Name
//        $uploadPath = 'images/articles'; //TODO: Set Upload Path
//        $image->move(public_path($uploadPath), $imageName); //TODO: Store File in Public Directory
        $title = ["ka" => $data['title_ka'], "en" => $data['title_en'], "ru" => $data['title_ru']];
        $description = ["ka" => $data['description_ka'], "en" => $data['description_en'], "ru" => $data['description_ru']];
        $storeDate = [
            'title' => $title,
            'description' => $description,
            'image' => $data['image'],
            'uuid' => Str::uuid()->toString(),
            'date' => $data['date']
        ];
        if ($request->visibility !== null) $storeDate = [...$storeDate, 'visibility' => $data['visibility']];

        Article::create($storeDate);
        return redirect() -> route('articles.index', ['language' => App::getLocale()]) -> with('success', 'სტატია შეიქმნა წარმატებით');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $language, Article $article)
    {
//        return  $article -> load('images', 'blocks');
        $article -> increment('view');
        return view('pages.view-more', [
            'language' => App::getLocale(),
            'article' => $article -> load('blocks', 'docs', 'authors'),
            'lasts' => Article::orderBy('id', 'desc')->where('visibility', '1')->take(3)->get(),
            'categories' => Category::all(),
            'author' => $article -> authors() -> first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $language, Article $article)
    {

        return view('admin.articles.edit', [
            'language' => App::getLocale(),
            'article' => $article -> load('blocks', 'categories', 'authors'),
            'routeName' => Route::currentRouteName(),
            'categories' => Category::all(),
            'sections' => Section::all(),
            'authors' => Author::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $language, Article $article)
    {
        $imageName = null;
        $data = $request->validated();
//        if($request->hasFile('image')){
//            $image = $request -> image;
//            $imageName = uniqid() . '-' . time() .'.'. $image -> extension(); // TODO: Generate new File Name
//            $uploadPath = 'images/articles'; // TODO: Set Upload Path
//            $isUploaded = $image->move(public_path($uploadPath), $imageName); // TODO: Store File in Public Directory
//            if(!$isUploaded) return redirect() -> back()-> with('warning', 'სურათის ატვირთვა ვერ მოხერხდა, სცადეთ თავიდან');
//        }
        $title = ["ka" => $data['title_ka'], "en" => $data['title_en'], "ru" => $data['title_ru']];
        $description = ["ka" => $data['description_ka'], "en" => $data['description_en'], "ru" => $data['description_ru']];
        $updatedData = [
            'title' => $title,
            'description' => $description,
            'image' => $data['image'],
            'section_id' => null
        ];
//        if ($imageName) $updatedData = [...$updatedData, 'image' => $imageName];
        if ($request -> filled('section_id')) $updatedData = [...$updatedData, 'section_id' => $data['section_id']];
        if ($request->visibility !== null) $updatedData = [...$updatedData, 'visibility' => $data['visibility']];
        if($request -> date) $updatedData = [...$updatedData, 'date' => $data['date']];
        $article->update($updatedData);
        return redirect() -> back()-> with('success', 'სტატია განახლდა წარმატებით');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $language, Article $article)
    {
        $article -> delete();
        return redirect() -> route('articles.index', ['language' => App::getLocale()]) -> with('success', 'სტატია წარმატებით წაიშალა.');
    }
    /**
     * custom methods.
     */
    public function setArticleCategories(Request $request, string $language, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'categories' => 'required|array|min:1',
        ]);
        if ($validator->fails()) {
            return redirect() -> back() -> with('error', 'კატეგორია არ არის არჩეული');
        }
       foreach ($request -> categories as $category) {
           $article->categories()->attach($category);
       }
       return redirect() -> back() -> with('success', 'კატეგორია წარმატებით დამეატა');
    }

    public function deleteArticleCategories(Request $request, string $language, Article $article, Category $category)
    {
         $article->categories()->detach($category);
         return redirect() -> back() -> with('success', 'category deleted successfully');
    }
    public function setArticleAuthor(Request $request, string $language, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'author_id' => 'required|exists:authors,id',
        ]);
        if ($validator->fails()) {
            return redirect() -> back() -> with('error', 'ავტორი არ არის არჩეული');
        }
        $article->authors()->attach($request -> author_id);
        return redirect() -> back() -> with('success', 'ავტორი წარმატებით დამეატა');
    }
}
