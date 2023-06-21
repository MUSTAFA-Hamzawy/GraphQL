<?php

namespace App\GraphQL\Query\Author;

use App\Models\Author;
use App\Models\Book;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AuthorsQuery extends Query
{
    protected $attributes = [
        'name' => 'Authors'
    ];

    public function type(): GraphQLType
    {
        return GraphQLType::listOf(GraphQL::Type('Author'));
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields){
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $relations = $fields->getRelations();
        return Author::select($select)->with($relations)->get();
    }
}
