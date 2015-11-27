<?php

namespace Freengersdev\firstmodule\Http;

use App\Http\Controllers\Controller;
use Freengersdev\firstmodule\Example;

class ExampleController extends Controller
{
    public function getUserTodoList()
    {
        $examples = Example::orderBy('id', 'desc')->get();

        return view('example::example-list')->with('examples', $examples);
    }
}
