<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('users.index')->with('users', $users);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'document' => ['required', 'numeric', 'unique:' . User::class],
            'fullname' => ['required', 'string'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date'],
            'photo' => ['required', 'image'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ]);

        // SUBIR FOTO
        $photo = null;
        if ($request->hasFile('photo')) {
            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('photos'), $photo);
        }

        // CREAR USUARIO
        $user = new User();
        $user->document  = $request->document;
        $user->fullname  = $request->fullname;
        $user->gender    = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->photo     = $photo;
        $user->phone     = $request->phone;
        $user->email     = $request->email;
        $user->password  = bcrypt($request->password);

        if ($user->save()) {
            return redirect('users')
                ->with('message', 'The user: ' . $user->fullname . ' was successfully added.');
        }
    }

    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $validation = $request->validate([
            'document' => ['required', 'numeric', 'unique:' . User::class . ',document,' . $user->id],
            'fullname' => ['required', 'string'],
            'gender' => ['required'],
            'birthdate' => ['required', 'date'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'unique:' . User::class . ',email,' . $user->id],
        ]);

        // FOTO ACTUAL
        $photo = $user->photo;

        // SI SUBE UNA NUEVA FOTO
        if ($request->hasFile('photo')) {

            // 1. SUBIR NUEVA FOTO
            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('photos'), $photo);

            // 2. ELIMINAR LA FOTO ANTERIOR (SI EXISTE Y NO ES DEFAULT)
            if ($user->photo && $user->photo !== 'no-photo.png') {
                $oldPath = public_path('photos/' . $user->photo);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
        }

        // ACTUALIZAR DATOS
        $user->document  = $request->document;
        $user->fullname  = $request->fullname;
        $user->gender    = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->phone     = $request->phone;
        $user->email     = $request->email;
        $user->photo     = $photo;

        if ($user->save()) {
            return redirect('users')
                ->with('message', 'The user: ' . $user->fullname . ' was successfully edited.');
        }
    }
    public function destroy(User $user)
    {
        if ($user->photo != 'no-photo.png') {
            unlink(public_path('photos/' . $user->photo));
        }

        if ($user->delete()) {
            return redirect('users')->with(
                'message',
                'The user: ' . $user->fullname . ' was successfully deleted!'
            );
        }
    }
    // search by scope
    public function search(Request $request)
    {
        $users =  User::name($request->q)->paginate(20);
        return view('users.search')->with('users', $users);
    }
    // Export PDF
    public function pdf()
    {
        $users = User::all();
        $pdf = PDF::loadView('users.pdf', compact('users'));
        return $pdf->download('allusers.pdf');
    }
    //Export EXCEL
    public function excel()
    {
        return Excel::download(new UsersExport, 'allusers.xlsx');
    }

    // EXCEL IMPORT
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new UsersImport, $file);
        return redirect()->back()->with('message', 'Users imported successful!');
    }
}
