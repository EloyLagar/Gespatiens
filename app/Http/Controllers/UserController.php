<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::simplePaginate(10);
        return view('employees.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enum = ['educator', 'worker', 'medical', 'psychologist', 'admin'];
        return view('employees.create', compact('enum'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->phone_number = $request->get('phone_number');
        $user->email = $request->get('email');
        $user->speciality = $request->get('speciality');
        $user->password = Hash::make($request->get('name') . '.Gespatiens');
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $enum = ['educator', 'worker', 'medical', 'psychologist', 'admin'];
        return view('employees.edit', ['employee' => $user, 'enum' => $enum]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        //Comprueba si esta lleno para cambiarlo
        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('speciality') && $request->speciality!=='none') {
            $user->speciality = $request->speciality;
        }

        if ($request->filled('phone_number')) {
            $user->phone_number = $request->phone_number;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        //Para la firma se comprueba primero si existe la imágen
        if ($request->hasFile('signature')) {

            //getClientOriginalExtension sirve para saber si la extension es PNG o JPEG por ejemplo. /signatures/ es la carpeta de public donde se guardará y se buscara con {{asset()
            $signatureName = '/signatures/' . $user->id . '.' . $request->signature->getClientOriginalExtension();
            $user->signature = $signatureName;
            //Guardado
            $signature = $request->file('signature');
            $signature->storeAs('public/signatures', $signatureName); //Aquó se almacena en el storage, se necesita hacer link con php artisan storage:link
        }

        $user->update();

        return redirect()->route('users.edit', $user->id)->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function redirectToEdit()
    {
        $user_id = Auth::user()->id;
        return redirect()->route('users.edit', ['user' => $user_id]);
    }
}
