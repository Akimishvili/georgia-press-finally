<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Doc;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocController extends Controller
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
    public function store(Request $request,string $language)
    {
        $data = $request -> validate([
            'title_ka' => 'required|string',
            'title_en' => 'required|string',
            'title_ru' => 'required|string',
            'file' => 'required|file',
            'article_id' => 'required|exists:articles,id'
        ]);
        $title = ["ka" => $data['title_ka'], "en" => $data['title_en'], "ru" => $data['title_ru']];
        $file = $request -> file;
        $fileName = uniqid() . '-' . time() .'.'. $file -> extension(); // TODO: Generate new File Name
        $uploadDir = 'docs/article_' . $data['article_id'];
        if(!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir);
        }
        $isUploaded = $file->move(public_path($uploadDir), $fileName);
        if($isUploaded) {
            Doc::create([
                'title' => $title,
                'url' => $fileName,
                'article_id' => $data['article_id']
            ]);
        }
        return redirect() -> back() -> with('success', 'ფაილი წარმატებით აიტვირთა');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
