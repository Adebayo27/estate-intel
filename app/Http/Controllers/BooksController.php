<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class BooksController extends BaseController
{
    //
    public function getAllBooks(Request $request)
    {   
        $query = $request->query();
        if(count($query) > 0){
            $books = Books::query();
            foreach($query as $key => $value){
                if($key == "release_date"){
                    $books->whereYear("created_at", '=' ,$value);
                }else{
                    $books->where($key, $value);
                }
                
            }
            $books = $books->get();

        }else{
            $books = Books::all();
        }
        
        return $this->sendResponse($books);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'isbn' => 'required',
            'authors' => 'required',
            'country' => 'required',
            'number_of_pages' => 'required',
            'publisher' => 'required',
            'release_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $input = $request->all();
        $book = Books::create($input);
        $books = [
            'book' => $book
        ];

        return $this->sendResponse($books, null, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'nullable',
                'isbn' => 'nullable',
                'authors' => 'nullable',
                'country' => 'nullable',
                'number_of_pages' => 'nullable',
                'publisher' => 'nullable',
                'release_date' => 'nullable|date',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $input = $request->all();
            $old_book = Books::find($id);
            $update = $old_book->update($input);
            if ($update) {
                $books = [
                    'book' => Books::find($id)
                ];

                $message = 'The book ' . $old_book->name . ' was updated successfully';
            } else {
                return $this->sendError('An Error Occured.');
            }

            return $this->sendResponse($books, $message, 200);
        } catch (\Throwable $th) {
            return $this->sendError('An Error Occured.');
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $book = Books::find($id);
            $message = 'The book ' . $book->name . ' was deleted successfully';
            $book->delete();
            return $this->sendResponse([], $message, 204);
        } catch (\Throwable $th) {
            return $this->sendError('An Error Occured.');
        }
    }

    public function getSingleBook(Request $request, $id)
    {
        try {
            $book = Books::find($id);
            return $this->sendResponse($book, null, 200);
        } catch (\Throwable $th) {
            return $this->sendError('An Error Occured.');
        }
    }

    public function externalBooks(Request $request)
    {
        try {
            $name = $request->query('name');
            $response = Http::get(env('BOOK_API') . '?name=' . $name);
            $resp_body = json_decode($response->body(), true);
            $books = [];
            if (count($resp_body) < 1) {
                return $this->sendResponse($books, null, 404, 'not found');
            }
            foreach ($resp_body as $single) {
                $book['name'] = $single['name'];
                $book['isbn'] = $single['isbn'];
                $book['authors'] = $single['authors'];
                $book['number_of_pages'] = $single['numberOfPages'];
                $book['publisher'] = $single['publisher'];
                $book['country'] = $single['country'];
                $time = strtotime($single['released']);
                $newformat = date('Y-m-d', $time);
                $book['release_date'] = $newformat;

                $books[] = $book;
            }

            return $this->sendResponse($books, null, 200);
        } catch (\Throwable $th) {
            return $this->sendError('An Error Occured.');
        }
    }
}
