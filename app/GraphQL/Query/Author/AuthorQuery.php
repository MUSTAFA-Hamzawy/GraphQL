<?php

namespace App\GraphQL\Query\Author;

use App\Models\Author;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AuthorQuery extends Query
{
    protected $attributes = [
        'name' => 'AuthorQuery'
    ];

    public function type(): Type
    {
        return GraphQL::Type('Author');
    }

    public function args(): array
    {
        return [
            'author_id' => [
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args){
        return Author::find($args['author_id']);
    }
}
