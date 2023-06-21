<?php

namespace App\GraphQL\Mutation\Author;

use App\Models\Author;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Rebing\GraphQL\Support\Mutation;

class DeleteAuthorMutation extends Mutation
{

    protected $attributes = ['name' => 'DeleteMutation'];

    public function args(): array
    {
        return [
            'author_id' => [
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required']
            ]
        ];
    }

    public function type(): Type
    {
        return Type::boolean();
    }

    public function resolve($root, $args){
        try {
            $author = Author::findOrFail($args['author_id']);
            return $author->delete();
        } catch (ModelNotFoundException $exception){

        }


    }

}
