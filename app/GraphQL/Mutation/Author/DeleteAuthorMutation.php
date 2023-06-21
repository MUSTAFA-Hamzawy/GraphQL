<?php

namespace App\GraphQL\Mutation\Author;

use App\Models\Author;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteAuthorMutation extends Mutation
{

    protected $attributes = ['name' => 'DeleteMutation'];

    public function args(): array
    {
        return [
            'author_id' => [
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
        $author = Author::findOrFail($args['author_id']);
        return $author->delete();
    }

}
