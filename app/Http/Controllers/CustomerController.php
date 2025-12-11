<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Adoption;
use App\Models\Pet;

class CustomerController extends Controller
{
    // ============================================
    //  MY PROFILE
    // ============================================
    public function myprofile()
    {
        $user = Auth::user();
        return view('customer.myprofile', compact('user'));
    }

    // ============================================
    //  UPDATE PROFILE
    // ============================================
    public function updateprofile(Request $request)
    {
        $user = Auth::user();

        // VALIDACIONES
        $request->validate([
            'document' => 'required|numeric|unique:users,document,' . $user->id,
            'fullname' => 'required|string',
            'gender' => 'required',
            'birthdate' => 'required|date',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // FOTO ACTUAL
        $photo = $user->photo;

        // SI SUBE UNA FOTO NUEVA
        if ($request->hasFile('photo')) {

            // SUBIR NUEVA
            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('photos'), $photo);

            // ELIMINAR ANTERIOR SI NO ES DEFAULT
            if ($user->photo && $user->photo != 'no-photo.png') {
                $oldPath = public_path('photos/' . $user->photo);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
        }

        // ACTUALIZAR DATOS
        $user->update([
            'document'  => $request->document,
            'fullname'  => $request->fullname,
            'gender'    => $request->gender,
            'birthdate' => $request->birthdate,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'photo'     => $photo,
        ]);

        return redirect('dashboard')
            ->with('message', 'My profile was successfully edited.');
    }

    
    // ============================================
    //  MY ADOPTIONS
    // ============================================
    public function myadoptions()
    {
        $adopts = Adoption::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc') // <- aquí
            ->get();

        return view('customer.myadoptions')->with('adoptions', $adopts);
    }


    public function showadoption(Request $request)
    {
        $adopt = Adoption::find($request->id);
        return view('customer.showadoption')->with('adoption', $adopt);
    }

    // ============================================
    // LIST AVAILABLE PETS
    // ============================================
    public function listpets()
    {
        $pets = Pet::where('status', 0)->paginate(20);
        return view('customer.makeadoption')->with('pets', $pets);
    }

    // ============================================
    // SEARCH PETS
    // ============================================
    public function search(Request $request)
    {
        $q = $request->q;

        $pets = Pet::kinds($q)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('customer.search', compact('pets'));
    }

    // ============================================
    // VIEW PET DETAILS
    // ============================================
    public function showPet($id)
    {
        $pet = Pet::findOrFail($id);

        return view('customer.petshow', compact('pet'));
    }

    // ============================================
    // ADOPT PET
    // ============================================
    public function adoptPet($id)
    {
        $pet = Pet::findOrFail($id);

        // YA ADOPTADA
        if ($pet->status == 1) {
            return redirect()->back()->with('error', 'Esta mascota ya está adoptada.');
        }

        // YA LA ADOPTÓ ESTE USUARIO
        $check = Adoption::where('user_id', Auth::id())
            ->where('pet_id', $id)
            ->first();

        if ($check) {
            return redirect()->back()->with('error', 'Ya adoptaste esta mascota.');
        }

        // CREAR REGISTRO DE ADOPCIÓN
        Adoption::create([
            'user_id' => Auth::id(),
            'pet_id'  => $pet->id,
            'status'  => 1
        ]);

        // ACTUALIZAR MASCOTA
        $pet->update([
            'status' => 1
        ]);

        return redirect()->route('customer.pet.show', $id)
            ->with('message', '¡Mascota adoptada con éxito!');
    }
}
