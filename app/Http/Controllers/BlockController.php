<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\UpdateBlockRequest;
use App\Models\Article;
use App\Models\Block;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlockRequest $request)
    {
        $data = $request->validated();
        $storeDate = [
            'article_id' => $data['article_id']
        ];
        $title = null;
        $sub_title = null;
        $description = null;
        $imageName = null;
        $video = null;

        /* TODO: Check the filled fields */
        if($request -> filled('title_ka')){
            $title = ["ka" => $data['title_ka'], "en" => $data['title_en'], "ru" => $data['title_ru']];
            $storeDate  = [...$storeDate, 'title' => $title];
        }
        if($request -> filled('sub_title_ka')){
            $sub_title = ["ka" => $data['sub_title_ka'], "en" => $data['sub_title_en'], "ru" => $data['sub_title_ru']];
            $storeDate  = [...$storeDate, 'sub_title' => $sub_title];
        }
        if($request -> filled('description_ka')){
            $description = ["ka" => $data['description_ka'], "en" => $data['description_en'], "ru" => $data['description_ru']];
            $storeDate  = [...$storeDate, 'description' => $description];
        }
        if($request -> filled('video')){
            $video = $data['video'];
            $storeDate  = [...$storeDate, 'video' => $video];
        }
        if($request -> hasFile('image')){
            $image = $request -> file('image');
            $imageName = uniqid() . '-' . time() .'.'. $image -> extension(); // TODO: Generate new File Name
            $uploadPath = 'images/articles/blocks/'; //TODO: Set Upload Path
            $isUploaded = $image->move(public_path($uploadPath), $imageName); //TODO: Store File in Public Directory
            $storeDate  = [...$storeDate, 'image' => $imageName];
            if(!$isUploaded) return redirect() -> back() -> with('warning', 'სურათის ატვირთვა ვერ მოხერხდა, სცადეთ დავიდან');
        }
        Block::create($storeDate);
        return redirect() -> back() -> with('success', 'სტატია სექცია წარმატებით დაემატა');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $language,Block $block)
    {

        return view('admin.blocks.edit',[
            'block' => $block,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $language, Block  $block)
    {
        $data = $request->all();
        $storeDate = [
            'article_id' => $data['article_id'],
            'title' => null,
            'sub_title' => null,
            'description' => null,
            'video' => null
        ];


        /* TODO: Check the filled fields */
        if($request -> filled('title_ka')){
            $title = ["ka" => $data['title_ka'], "en" => $data['title_en'], "ru" => $data['title_ru']];
            $storeDate  = [...$storeDate, 'title' => $title];
        }


        if($request -> filled('sub_title_ka')){
            $sub_title = ["ka" => $data['sub_title_ka'], "en" => $data['sub_title_en'], "ru" => $data['sub_title_ru']];
            $storeDate  = [...$storeDate, 'sub_title' => $sub_title];
        }

        if($request -> filled('description_ka')){
            $description = ["ka" => $data['description_ka'], "en" => $data['description_en'], "ru" => $data['description_ru']];
            $storeDate  = [...$storeDate, 'description' => $description];
        }

        if($request -> filled('video')){
            $video = $data['video'];
            $storeDate  = [...$storeDate, 'video' => $video];
        }

        if($request -> hasFile('image')){
            $image = $request -> file('image');
            $imageName = uniqid() . '-' . time() .'.'. $image -> extension(); // TODO: Generate new File Name
            $uploadPath = 'images/articles/blocks/'; //TODO: Set Upload Path
            $isUploaded = $image->move(public_path($uploadPath), $imageName); //TODO: Store File in Public Directory
            $storeDate  = [...$storeDate, 'image' => $imageName];
            if(!$isUploaded) return redirect() -> back() -> with('warning', 'სურათის ატვირთვა ვერ მოხერხდა, სცადეთ დავიდან');
        }
        $block -> update($storeDate);
        return redirect() -> back() -> with('success', 'სტატიის სექცია განახლდა წარმატებით');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $language ,Block $block)
    {
        $block -> delete();
        return redirect() -> route('articles.edit',['language' => App::getLocale() ,'article' => $block -> article_id]) -> with('success', 'ბლოკი წარმატებით წაიშალა.');
    }
}
