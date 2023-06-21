<?php

namespace App\GraphQL\Mutation\Book;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateBookMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateBook',
        'description' => 'To update the book info'
    ];

    public function type(): Type
    {
        return GraphQL::Type('Book');
    }

    public function args(): array
    {
        return [
            'book_id' => [
                'type' => Type::int(),
                'rules' => ['required', 'integer']
            ],
            'book_title' => [
                'type' => Type::string(),
                'rules' => [ 'string']
            ],
            'book_description' => [
                'type' => Type::string(),
                'rules' => [ 'string']
            ],
            'author_id' => [
                'type' => Type::int(),
                'rules' => [ 'integer']
            ]
        ];
    }

    public function resolve($root, $args){
        try {
            $author = Book::findOrFail($args['book_id']);
            $author->fill($args);
            $author->save();
            return $author;
        }
        catch(ModelNotFoundException $exception){
        }

    }
}
