<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use App\Models\Subject;

use Exception;

class SubjectController extends Controller {
    protected $model;
    protected $title = 'Mata Pelajaran';
    protected $view = 'admin.subject.';
    protected $route = 'admin.subjects.';
    protected $fields = [ 'name' ];

    public function __construct(Subject $model) {
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
        return view($this->view.'form');
    }

    public function store(Request $request) {
        DB::beginTransaction();
        $payload = $request->only($this->fields);
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
        $data = $this->model->findOrFail($id);
        return view($this->view.'form', compact('data'));
    }

    public function update(Request $request, $id) {
        DB::beginTransaction();
        $payload = $request->only($this->fields);
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
