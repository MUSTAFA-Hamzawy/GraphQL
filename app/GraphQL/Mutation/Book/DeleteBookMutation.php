<?php

namespace App\GraphQL\Mutation\Book;

use App\Models\Author;
use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteBookMutation extends Mutation
{

    protected $attributes = ['name' => 'DeleteBook'];

    public function args(): array
    {
        return [
            'book_id' => [
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function type(): Type
    {
        return Type::boolean();
    }

    public function resolve($root, $args){
        $author = Book::findOrFail($args['book_id']);
        return $author->delete();
    }

}
