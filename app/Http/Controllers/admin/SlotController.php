<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function slots()
    {
        $slots = Slot::all();
        return view('admin.slots', compact('slots'));
    }

    public function update(Request $request, $id)
    {

        $slot = Slot::find($id);

        if (!is_null($slot)) {
            $slot->no_of_slots = $request->no_of_slots;
        }

        $slot->save();

        if ($slot) {
            session()->flash('slot-update-success', 'Slot updated successfully');
            return redirect('/superadmin/slots');
        } else {
            session()->flash('slot-update-error', 'Something went wrong');
            return redirect('/slots');
        }
    }

    public function updateSlot(Request $request, $id)
    {



        $slot = Slot::find($id);

        $employee = User::where('rfid', '=', $request->rfid)->first();

        if (!is_null($employee)) {
            $slot->no_of_slots = $slot->no_of_slots - 1;
            $slot->save();

            if ($slot) {
                session()->flash('slot-update-success', 'RFID entry successful');
                return redirect('/superadmin/vehicle-entry');
            } else {
                session()->flash('slot-update-error', 'Something went wrong');
                return redirect('/superadmin/vehicle-entry');
            }
        } else {
            session()->flash('slot-update-error', 'RFID wrong entry');
            return redirect('/superadmin/vehicle-entry');
        }
    }

    public function vechileEntry()
    {
        $slots = Slot::all();
        $slot = $slots[0];
        return view('admin.vehicle-entry', compact('slot'));
    }
}
