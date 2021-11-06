<?php

use Illuminate\Database\Eloquent\Model;
use LaravelLegends\EloquentFilter\Contracts\Filterable;
use LaravelLegends\EloquentFilter\HasFilter;
class User extends Model implements Filterable
{
    use HasFilter;

    protected $table = 'users';

    public $allowedFilters = [
        'name' => 'contains',
        'email' => true,
        'age'   => ['max', 'min'],
    ];

    public function getFilterable(): array
    {
        return $this->allowedFilters;
    }

    public function phones()
    {
        return $this->hasMany(UserPhone::class);
    }

    public function documents()
    {
        return $this->hasMany(UserDocument::class);
    }
}