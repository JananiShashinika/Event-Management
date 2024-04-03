<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Task;
use App\Models\EventType;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $event_types = EventType::all();
        return view('pages.task.task', compact('event_types'));
    }

    public function task_form(Request $request)
    {
        $atc = new attachment();
        $list = new Task();

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $list->task_name = $request->task_name;
        // $atc->task_no = $request->task_no;
        $atc->image = $file_name;
        $list->save();
        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $task_name = $request->task_name;

        //check if the value already exists in the database
        $existinnData = Task::where('task_name', $task_name)
            ->where('event_type_id', $request->event_type)
            ->first();

        if ($existinnData) {
            return response()->json(['success' => false, 'message' => $task_name . ' already exists in the database', 'title' => 'Found Duplicate', 'type' => 'info']);
        }
        if ($request->hasFile('attachment')) {
            $attachment = $request->attachment;
            $file_name = $attachment->getClientOriginalName();
            $path = time() . '_' . $attachment->getClientOriginalName();
            $attachment->move('attachments', $path);
        } else {
            $file_name = "";
            $path = "";
        }

        $data = [
            'task_name' => $task_name,
            'attachment' => $file_name,
            'path' => $path,
            'event_type_id' => $request->event_type,
        ];
        $task = Task::create($data);

        if ($task) {
            return response()->json(['success' => true, 'message' => 'Data added successfully', 'title' => 'Saved!', 'type' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data insertion failed', 'title' => 'Failed', 'type' => 'error']);
        }

        /*if insert attachments to another table*/
        /*
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $attachmentFile) {
                    $file_name = $attachmentFile->getClientOriginalName();
                    $attachmentPath = $attachmentFile->store('public/', $file_name);
                    dd($attachmentFile);
                    $attachment = Attachment::create([
                        'checklist_id' => $task->id,
                        'file_path' => $attachmentPath,
                    ]);
                }
            }
        if ($task && $attachment) {
            return response()->json(['success' => true, 'message' => 'Event type added successfully', 'title' => 'Saved!', 'type' => 'success']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data insertion failed', 'title' => 'Failed', 'type' => 'error']);
        }*/

    }

    public function fetchAll()
    {
        $event_types = EventType::all();
        $output = '';
        if ($event_types->count() > 0) {
            $output .= '<table class="table align-middle">
        <thead>
          <tr>
            <th>#</th>
            <th>Event Type</th>
            <th>Task</th>
            <th>Attachment</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>';
            foreach ($event_types as $key => $event_type) {
                $tasks = Task::where('event_type_id', $event_type->id)->get();
                $task_count = $tasks->count();

                if ($task_count > 0) {
                    $output .=
                        '<tr>
                            <td rowspan="' . $task_count . '">' . ++$key . '</td>
                            <td rowspan="' . $task_count . '">' . $event_type->event_type . '</td>
                            <td>' . $tasks[0]->task_name . '</td>
                            <td>' . $tasks[0]->attachment . '</td>
                            <td>
                                <a href="#" id="' . $tasks[0]->id . '" class="btn btn-warning btn-sm mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#view_atch_modal" title="view"><i class="bx bxs-file" style="font-size: 20px"></i></a>
                                <a href="' . '/task/download/' . $tasks[0]->id . '" class="btn btn-success btn-sm mx-1 downloadIcon" title="download"><i class="bx bxs-download" style="font-size: 20px"></i></a>
                                <a href="#" id="' . $tasks[0]->id . '" class="btn btn-primary btn-sm mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editTaskModel" title="edit"><i class="bx bx-edit" style="font-size: 20px"></i></a>
                                <a href="#" id="' . $tasks[0]->id . '" class="btn btn-danger btn-sm mx-1 deleteIcon" title="delete"><i class="bx bxs-trash" style="font-size: 20px"></i></a>
                            </td>
                        </tr>';

                    for ($i = 1; $i < $task_count; $i++) {
                        $output .=
                            '<tr>
                                <td>' . $tasks[$i]->task_name . '</td>
                                <td>' . $tasks[$i]->attachment . '</td>
                                <td>
                                    <a href="#" id="' . $tasks[$i]->id . '" class="btn btn-warning btn-sm mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#view_atch_modal" title="view"><i class="bx bxs-file" style="font-size: 20px"></i></a>
                                    <a href="' . '/task/download/' . $tasks[$i]->id . '" class="btn btn-success btn-sm mx-1 downloadIcon" title="download"><i class="bx bxs-download" style="font-size: 20px"></i></a>
                                    <a href="#" id="' . $tasks[$i]->id . '" class="btn btn-primary btn-sm mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editTaskModel" title="edit"><i class="bx bx-edit" style="font-size: 20px"></i></a>
                                    <a href="#" id="' . $tasks[$i]->id . '" class="btn btn-danger btn-sm mx-1 deleteIcon" title="delete"><i class="bx bxs-trash" style="font-size: 20px"></i></a>
                                </td>
                            </tr>';
                    }
                }
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h4 class="text-center text-secondary my-5">No record in the database!</h4>';
        }
    }

    /*
     * To display attachment.
     */
    public function view_attachment(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        return response()->json($task);
    }

    /*
     * To download attachment.
     */
    public function download_attachment($id)
    {
        $task = Task::find($id);
        return response()->download(public_path('attachments/' . $task->path), $task->attachment);
    }

    /*
     * To display task details on edit modal.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        return response()->json($task);
    }

    /*
     * Update existing task
     */
    public function update(Request $request)
    {
        $task_name = $request->edit_task;
        $event_type_id = $request->event_type_EF;

        //check if the value already exists in the database
//        $existingData = Task::where('task_name', $task_name)
//            ->where('event_type_id', $event_type_id)
//            ->first();

//        if ($existingData) {
//            return response()->json(['success' => false, 'message' => $task_name . ' already exists in the database', 'title' => 'Found Duplicate', 'type' => 'info']);
//        }
        $task = Task::find($request->task_id_EF);
        $old_path = $task->path;
        $old_attachment_name = $task->attachment;

        if ($request->hasFile('attachment_EF')) {
            $attachment = $request->attachment_EF;
            $file_name = $attachment->getClientOriginalName();
            $path = time() . '_' . $attachment->getClientOriginalName();
            $attachment->move('attachments', $path);

            if ($old_path !== "") {
                $old_attachment_path = public_path('attachments/' . $old_path);
                if (file_exists($old_attachment_path)) {
                    unlink($old_attachment_path);
                }
            }
        } else {
            if ($old_path !== "" && $old_attachment_name !== "") {
                $file_name = $old_attachment_name;
                $path = $old_path;
            } else {
                $file_name = "";
                $path = "";
            }
        }

        $update_data = [
            'task_name' => $task_name,
            'attachment' => $file_name,
            'path' => $path,
            'event_type_id' => $event_type_id,
        ];
        $task->update($update_data);
        return response()->json(['success' => true, 'message' => 'updated successfully', 'title' => 'Updated!', 'type' => 'success']);

    }

    /*
     * delete selected task from the database
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        $image_path = public_path('attachments/' . $task->path);
        if ($task->path !== "" && $task->attachment !== "") {
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $task->delete();
    }
}

