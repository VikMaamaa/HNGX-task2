<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PersonController extends Controller
{
    // Create a new person
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|unique:people,name|string'
        ]);

        $person = Person::create($data);

        return response()->json($person);
    }

    // Fetch details of a person
    public function show($id) {
        $person = Person::find($id);

        if(!$person) {
            return response()->json(['message'=>'Person not found'], 404);
        }

        return response()->json($person);
    }

    //Update details of an existing person
    public function update(Request $request, $id) {
        $person = Person::find($id);

        if(!$person) {
            return response()->json(['message'=>'Person not found'], 404);
        }

        // $data = $request->validate([
        //     'name' => 'required|unique:people,name|string'
        // ]);

        try {
            $this->validate($request, [
                'name' => 'required|string|unique:people,name,' . $person->id,
                'age' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['message' => $e->getMessage()], 422);
        }

        $person->update($request->all());

        return response()->json($person);
    }

    //Remove a person
    public function destroy($id) {
        $person = Person::find($id);

        if(!$person) {
            return response()->json(['message'=>'Person not found']);
        }

        $person->delete();

        return response()->json(['message' => 'Person deleted'], 200);
    }
}
