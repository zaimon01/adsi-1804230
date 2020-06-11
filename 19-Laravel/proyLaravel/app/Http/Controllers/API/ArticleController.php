<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Article;
use Validator;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends BaseController
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$arts = Article::all();

return $this->sendResponse(ArticleResource::collection($arts), 'Articles retrieved successfully.');
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$input = $request->all();

$validator = Validator::make($input, [
'title' => 'required|min:4|unique:articles',
'content' => 'required',
'user_id' => 'required',
'category_id' => 'required',
'slider' => 'required',
'price' => 'required|numeric|min:1|max:100',
]);

if($validator->fails()){
return $this->sendError('Validation Error.', $validator->errors());
}

$art = Article::create($input);

return $this->sendResponse(new ArticleResource($art), 'Article created successfully.');
}

/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$art = Article::find($id);

if (is_null($art)) {
return $this->sendError('Article not found.');
}

return $this->sendResponse(new ArticleResource($art), 'Article retrieved successfully.');
}

/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$input = $request->all();

$validator = Validator::make($input, [
'title' => 'required|min:4|unique:articles',
'content' => 'required',
'user_id' => 'required',
'category_id' => 'required',
'slider' => 'required',
'price' => 'required|numeric|min:1|max:100',
]);


$art = Article::find($id);
$art->title = $input['title'];
$art->content = $input['content'];
$art->user_id = $input['user_id'];
$art->category_id = $input['category_id'];
$art->slider = $input['slider'];
$art->price = $input['price'];
$art->save();

return $this->sendResponse(new ArticleResource($art), 'Article updated successfully.');
}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$art = Article::find($id);
$art->delete();
return $this->sendResponse([], 'Article deleted successfully.');
}
}