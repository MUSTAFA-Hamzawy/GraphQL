<?php

namespace App\GraphQL\Query\Book;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class BookQuery extends Query
{
    protected $attributes = [
        'name' => 'BookQuery'
    ];

    public function args(): array
    {
        return [
            'book_id' => [
                'type' => Type::nonNull(Type::int()),
                'rule' => ['required']
            ]
        ];
    }

    public function type(): Type
    {
        return GraphQL::Type('Book');
    }

    public function resolve($root, $args){
        return Book::find($args['book_id']);
    }
}
