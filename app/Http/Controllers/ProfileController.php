<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the update profile page.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user()
        ]);
    }

    /**
 * Update user's profile
 *
 * @param  Request $request
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function update(Request $request)
{
    $request->user()->update(
        $request->all()
    );

    return redirect()->route('profile.edit');
}
}