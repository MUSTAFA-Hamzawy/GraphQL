<?php

namespace App\GraphQL\Mutation\Author;

use App\Models\Author;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateAuthorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateAuthor'
    ];

    public function type(): GraphQLType
    {
        return GraphQL::Type('Author');
    }

    public function args(): array
    {
        return [
            'author_name' => [
                'type' => Type::string()
            ],
            'author_nationality' => [
                'type' => Type::string()
            ],
            'author_address' => [
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args){
        $author = new Author();
        $author->fill($args);
        $author->save();
        return $author;
    }



}
