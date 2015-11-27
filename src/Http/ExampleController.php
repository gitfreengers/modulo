<?php

namespace freengers;

use freengers\Example;
use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    public function getUserTodoList()
    {
        $examples = Example::orderBy('id', 'desc')->get();

        return view('example::example-list')->with('examples', $examples);
    }
}
