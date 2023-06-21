<?php

namespace App\GraphQL\Type;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class BookType extends GraphQLType
{
    // attributes are the type configurations
    protected $attributes = [
        'name' => 'Book',
        'description' => 'List of Books with their authors',
        'model' => Book::class
    ];

    // This function returns the fields that user can ask for
    public function fields(): array
    {
        return [
            'book_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of the book'
            ],
            'book_title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the book'
            ],
            'book_description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of the book'
            ],
            'author' => [
                'type' => GraphQL::Type('Author'),
                'description' => 'Author of the book'
            ],
        ];
    }
}
