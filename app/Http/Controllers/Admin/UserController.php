<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Json;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $huidige_user = User::findOrFail(auth()->id());
        $name_email = '%' . $request->input('user') . '%';
        $order = $request->input('order') ?? '%';
        $x = "";
        $y = "";
        switch ($order) {
            case "%":
                $x = 'id';
                $y = 'asc';
                break;
            case "nameA":
                $x = 'name';
                $y = 'asc';
                break;
            case "nameZ":
                $x = 'name';
                $y = 'desc';
                break;
            case "emailA":
                $x = 'email';
                $y = 'asc';
                break;
            case "emailZ":
                $x = 'email';
                $y = 'desc';
                break;
            case "notActive":
                $x = 'active';
                $y = 'asc';
                break;
            case "admin":
                $x = 'admin';
                $y = 'desc';
                break;
        }
        $users = User::orderBy($x, $y)
            ->where(function ($query) use ($name_email) {
                $query->where('name', 'like', $name_email);
            })
            ->orWhere(function ($query) use ($name_email) {
                $query->where('email', 'like', $name_email);
            })
            ->paginate(10);
        $result = compact('users', 'huidige_user');
        Json::dump($result);
        return view('admin.users.index', $result);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'telephone' => 'required|numeric'
        ]);

        $user->name = $request->name;
        $user->sur_name = $request->sur_name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->password = hash::make('welkom123');
        if (isset($request->admin)) {
            $user->admin = 1;
        }
        if (!isset($request->admin)) {
            $user->admin = 0;
        }
        if (isset($request->is_contactpersoon)) {
            $user->is_contactpersoon = 1;
        }
        if (!isset($request->is_contactpersoon)) {
            $user->is_contactpersoon = 0;
        }
        $user->save();
        session()->flash('success', "De gebruiker <b>$user->name</b> is aangemaakt.");
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $result = compact('user');
        Json::dump($result);
        return view('admin.users.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'telephone' => 'required|numeric'
        ]);

        $user->name = $request->name;
        $user->sur_name = $request->sur_name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        if (isset($request->admin)) {
            $user->admin = 1;
        }
        if (!isset($request->admin)) {
            $user->admin = 0;
        }
        if (isset($request->is_contactpersoon)) {
            $user->is_contactpersoon = 1;
        }
        if (!isset($request->is_contactpersoon)) {
            $user->is_contactpersoon = 0;
        }
        $user->save();
        session()->flash('success', "De gebruiker <b>$user->name</b> is aangepast.");
        return redirect('admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', "de gebruiker <b>$user->name</b> is verwijderd.");
        return redirect('admin/users');
    }
}
