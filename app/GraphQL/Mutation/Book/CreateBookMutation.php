<?php

namespace App\GraphQL\Mutation\Book;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateBookMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createBook',
        'description' => 'To insert a new book'
    ];

    public function type(): GraphQLType
    {
        return GraphQL::Type('Book');
    }

    public function args(): array
    {
        return [
            'book_title' => [
                'type' => Type::string(),
            ],
            'book_description' => [
                'type' => Type::string()
            ],
            'author_id' => [
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args){
        $book = new Book();
        $book->fill($args);
        $book->save();
        return $book;
    }

}
