<?php

namespace App\GraphQL\Query\Book;


use App\Models\Book;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Closure;
class BooksQuery extends Query
{
    public function attributes(): array
    {
        return [
            'name' => 'BooksQuery'
        ];
    }

    public function type(): Type
    {
        return Type::listOf(GraphQL::Type('Book'));
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields){
        $fields = $getSelectFields(); // get the fields which user asked for in the query
        $select = $fields->getSelect();   // select the fields
        $relations = $fields->getRelations();  // foreign key


        return Book::select($select)->with($relations)->get();
    }
}
