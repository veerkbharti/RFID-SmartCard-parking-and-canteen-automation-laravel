<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

        $filename = '';
        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = "thumbnails/" . $filename;
            $request->file('thumbnail')->storeAs("public/thumbnails", $filename);
        }


        $food = new Food;
        $food->name = $request->name;
        $food->category = $request->category;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->thumbnail = $filename;
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

        if (!is_null($food)) {
            $food->name = $request->name;
            $food->category = $request->category;
            $food->price = $request->price;
            $food->description = $request->description;
            $filename = '';

            if ($request->file('thumbnail')) {

                Storage::delete('public/thumbnails/' . $food->thumbnail);

                $file = $request->file('thumbnail');
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = "thumbnails/" . $filename;
                $request->file('thumbnail')->storeAs("public/thumbnails", $filename);

                $food->thumbnail = $filename;
            }
        }

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
        if (!is_null($food)) {
            Storage::delete('public/thumbnails/' . $food->thumbnail);
            $food->delete();
        }

        session()->flash('food-delete-success', 'Food deleted successfully');
        return redirect('/superadmin/foods');
    }
}
