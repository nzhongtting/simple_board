<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCRUD extends Model
{
    protected $table = 'test_tab';
    protected $fillable = ['title', 'description'];
}
