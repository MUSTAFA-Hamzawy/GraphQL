<?php

namespace App\GraphQL\Type;

use App\Models\Author;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class AuthorType extends GraphQLType
{
    // attributes are the type configurations
    protected $attributes = [
        'name' => 'Author',
        'description' => 'List of Authors',
        'model' => Author::class
    ];

    // This function returns the fields that user can ask for
    public function fields(): array
    {
        return [
            'author_id' => [
                'type' => Type::int(),
                'description' => 'ID of the author'
            ],
            'author_name' => [
                'type' => Type::string(),
                'description' => 'Name of the author'
            ],
            'author_nationality' => [
                'type' => Type::string(),
                'description' => 'Nationality of the author'
            ],
            'author_address' => [
                'type' => Type::string(),
                'description' => 'Address of the author'
            ],
            'books' => [
                'type' => Type::listOf(GraphQL::Type('Book')),
                'description' => 'List of associated books to this author.'
            ]
        ];
    }
}
