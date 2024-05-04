<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Select2UserListController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::select(['id', 'name'])
                    ->where('name', 'like', '%' . $request->q . '%')
                    ->orderBy('name', 'asc')
                    ->paginate(10, ['*'], 'page', $request->page ?? 1);

        return response()->json($users);
    }
}
