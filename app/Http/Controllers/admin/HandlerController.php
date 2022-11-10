<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HandlerController extends Controller
{
    public function handlers()
    {
        $handlers = User::all()->where('role', 'handler');
        return view('admin.handlers', compact('handlers'));
    }

    public function addHandler()
    {
        return view('admin.add-handler');
    }

    public function createHandler(Request $request)
    {

        $handler = new User;
        $handler->first_name = $request->first_name;
        $handler->last_name = $request->last_name;
        $handler->email = $request->email;
        $handler->mobile = $request->mobile;
        $handler->gender = $request->gender;
        $handler->dob = $request->dob;
        $handler->address = $request->address;
        $handler->city = $request->city;
        $handler->company = $request->company;
        $handler->job_title = $request->job_title;
        $handler->role = "handler";
        $handler->rfid = rand(10000, 99999);
        $handler->password = Hash::make($request->password);
        $handler->email_verified_at = now();
        $handler->remember_token = Str::random(10);
        $handler->save();

        if ($handler) {
            session()->flash('handler-add-success', 'Handler created successfully');
            return redirect()->route('handler.add');
        } else {
            session()->flash('handler-add-error', 'Something went wrong');
            return redirect()->route('handler.add');
        }
    }

    public function editHandler($id)
    {
        $handler = User::find($id);
        return view('admin.edit-handler', compact('handler'));
    }

    public function updateHandler(Request $request, $id)
    {

        $handler = User::find($id);
        $handler->first_name = $request->first_name;
        $handler->last_name = $request->last_name;
        $handler->email = $request->email;
        $handler->mobile = $request->mobile;
        $handler->gender = $request->gender;
        $handler->dob = $request->dob;
        $handler->address = $request->address;
        $handler->city = $request->city;
        $handler->company = $request->company;
        $handler->job_title = $request->job_title;
        $handler->save();

        if ($handler) {
            session()->flash('handler-update-success', 'Handler updated successfully');
            return redirect()->route('handler.edit', ['id' => $handler->id]);
        } else {
            session()->flash('handler-update-error', 'Something went wrong');
            return redirect()->route('handler.edit', ['id' => $handler->id]);
        }
    }

    public function deleteHandler($id)
    {
        $handler = User::find($id);
        if (!is_null($handler)) $handler->delete();

        session()->flash('handler-delete-success', 'Handler deleted successfully');
        return redirect('/superadmin/handlers');
    }
}
