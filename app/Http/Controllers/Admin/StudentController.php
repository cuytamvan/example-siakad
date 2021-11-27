<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use App\Models\Student;
use App\Models\ClassRoom;

use Exception;

class StudentController extends Controller {
    protected $model;
    protected $title = 'Murid';
    protected $view = 'admin.student.';
    protected $route = 'admin.students.';
    protected $fields = [ 'nis', 'first_name', 'last_name', 'password', 'address', 'class_room_id' ];

    public function __construct(Student $model) {
        $this->model = $model;

        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
    }

    public function index() {
        $data = $this->model->all();
        return view($this->view.'index', compact('data'));
    }

    public function create() {
        $classRooms = ClassRoom::all();
        return view($this->view.'form', compact('classRooms'));
    }

    public function store(Request $request) {
        DB::beginTransaction();
        $payload = $request->only($this->fields);
        $payload['password'] = bcrypt($payload['password']);
        try {
            $this->model->create($payload);

            session()->flash('success', 'Berhasil di simpan');
            DB::commit();
            return redirect()->route($this->route.'index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $classRooms = ClassRoom::all();
        $data = $this->model->findOrFail($id);
        return view($this->view.'form', compact('data', 'classRooms'));
    }

    public function update(Request $request, $id) {
        DB::beginTransaction();
        $payload = $request->only($this->fields);
        if (!$payload['password']) unset($payload['password']);
        else $payload['password'] = bcrypt($payload['password']);
        try {
            $data = $this->model->findOrFail($id);
            $data->update($payload);

            session()->flash('success', 'Berhasil di edit');
            DB::commit();
            return redirect()->route($this->route.'index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $data = $this->model->findOrFail($id);
            $data->delete();

            session()->flash('success', 'Berhasil di hapus');
            DB::commit();
            return redirect()->route($this->route.'index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
