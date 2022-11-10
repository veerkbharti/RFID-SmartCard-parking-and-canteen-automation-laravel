<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class FoodController extends Controller
{
    public function foods()
    {
        $foods = Food::all();
        return view('admin.foods', compact('foods'));
    }

    public function addFood()
    {
        return view('admin.add-food');
    }

    public function createFood(Request $request)
    {

        $food = new Food;
        $food->name = $request->name;
        $food->category = $request->category;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->gender = $request->gender;

        
        $food->save();

        if ($food) {
            session()->flash('food-add-success', 'Food created successfully');
            return redirect()->route('food.add');
        } else {
            session()->flash('food-add-error', 'Something went wrong');
            return redirect()->route('food.add');
        }
    }

    public function editFood($id)
    {
        $food = Food::find($id);
        return view('admin.edit-food', compact('food'));
    }

    public function updateFood(Request $request, $id)
    {

        $food = Food::find($id);
        $food->first_name = $request->first_name;
        $food->last_name = $request->last_name;
        $food->email = $request->email;
        $food->mobile = $request->mobile;
        $food->gender = $request->gender;
        $food->dob = $request->dob;
        $food->address = $request->address;
        $food->city = $request->city;
        $food->company = $request->company;
        $food->job_title = $request->job_title;
        $food->save();

        if ($food) {
            session()->flash('food-update-success', 'Food updated successfully');
            return redirect()->route('food.edit', ['id' => $food->id]);
        } else {
            session()->flash('food-update-error', 'Something went wrong');
            return redirect()->route('food.edit', ['id' => $food->id]);
        }
    }

    public function deleteFood($id)
    {
        $food = Food::find($id);
        if (!is_null($food)) $food->delete();

        session()->flash('food-delete-success', 'Food deleted successfully');
        return redirect('/superadmin/foods');
    }
}
