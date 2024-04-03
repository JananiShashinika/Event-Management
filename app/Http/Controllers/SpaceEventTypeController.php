<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class SpaceEventTypeController extends Controller
{
    public function index()
    {
        return view('pages.space_event_type.space_event_type_list');
    }

    public function fetchAll()
    {
        $eventTypes = EventType::all();
        $output = '';
        if ($eventTypes->count() > 0) {
            $output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Event Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($eventTypes as $key => $eventType) {
                $output .= '<tr>
                <td>' . ++$key . '</td>
                <td>' . $eventType->event_type . '</td>
                <td>
                  <a href="#" id="' . $eventType->id . '" class="btn btn-primary btn-sm mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEventTypeModel"><i class="bx bx-edit" style="font-size: 20px"></i></a>
                  <a href="#" id="' . $eventType->id . '" class="btn btn-danger btn-sm mx-1 deleteIcon"><i class="bx bxs-trash" style="font-size: 20px"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h4 class="text-center text-secondary my-5">No record in the database!</h4>';
        }
    }

    public function store(Request $request)
    {
        $value = $request->event_type;

        //check if the value already exists in the database
        $existinnData = EventType::where('event_type', $value)->first();

        if ($existinnData) {
            return response()->json(['success' => false, 'message' => $value . ' already exists in the database', 'title' => 'Found Duplicate', 'type' => 'info']);
        }

        $data = ['event_type' => $request->event_type,];
        EventType::create($data);
        return response()->json(['success' => true, 'message' => 'Event type added successfully', 'title' => 'Saved!', 'type' => 'success']);

    }

    /*
     * To display event type details on edit modal.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $eventType = EventType::find($id);
        return response()->json($eventType);
    }

    /*
     * Update existing event type
     */
    public function update(Request $request)
    {
        $event_type = EventType::find($request->event_id);
        $value = $request->edit_event_type;

        //check if the value already exists in the database
        $existinnData = EventType::where('event_type', $value)->first();

        if ($existinnData) {
            return response()->json(['success' => false, 'message' => $value . ' already exists in the database', 'title' => 'Found Duplicate', 'type' => 'info']);
        }

        $update_data = ['event_type' => $request->edit_event_type,];
        $event_type->update($update_data);
        return response()->json(['success' => true, 'message' => 'Event type updated successfully', 'title' => 'Updated!', 'type' => 'success']);

    }

    /*
     * delete selected event type from the database
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        EventType::destroy($id);
    }
}
