<?php

namespace App\GraphQL\Mutation\Author;

use App\Models\Author;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateAuthorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAuthor',
        'description' => 'To update the author info'
    ];

    public function type(): Type
    {
        return GraphQL::Type('Author');
    }

    public function args(): array
    {
        return [
            'author_id' => [
                'type' => Type::int()
            ],
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
        try {
            $author = Author::findOrFail($args['author_id']);
            $author->fill($args);
            $author->save();
            return $author;
        }
        catch(ModelNotFoundException $exception){
        }

    }
}
