<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class UserController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize("manageuser", User::class);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize("manageuser", User::class);
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'is_admin' => 'boolean', 
        ]);
        $this->authorize("manageuser", User::class);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin ?? false, 
        ]);
    
        return redirect()->route('users.index')->with('success', 'User  created successfully.');
    }

    public function edit(User $user)
    {
        $this->authorize("manageuser", User::class);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
        $this->authorize("manageuser", User::class);
        $user->update($request->only('name', 'email'));

        return redirect()->route('users.index')->with('success', 'User  updated successfully.');
    }

    public function destroy(User $user)
    {
        $this->authorize("manageuser", User::class);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User  deleted successfully.');
    }
}