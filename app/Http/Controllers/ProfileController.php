<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the specified user's public profile.
     */
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('profile.public', [
            'user' => $user,
        ]);
    }

    /**
     * Search for users by name or username.
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        $users = User::query()
            ->when($query, function ($q) use ($query) {
                $q->where(function($query_inner) use ($query) {
                    $query_inner->where('name', 'like', "%{$query}%")
                                ->orWhere('username', 'like', "%{$query}%");
                });
            })
            ->paginate(20);

        return view('profile.search', [
            'users' => $users,
            'query' => $query,
        ]);
    }
}
