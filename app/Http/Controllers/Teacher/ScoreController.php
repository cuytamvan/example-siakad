<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\ClassRoom;
use App\Models\SchoolYear;
use App\Models\Score;
use App\Models\TestType;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ScoreController extends Controller {
    protected $model;

    protected $view = 'teacher.score.';
    protected $route = 'teacher.scores.';
    protected $guard = 'teacher';

    public function __construct(Score $model) {
        $this->model = $model;

        View::share('view', $this->view);
        View::share('route', $this->route);
    }
    
    public function index(Request $request) {
        $user = auth($this->guard)->user();
        $query = $request->query();
        $schoolYears = SchoolYear::all();
        $classRooms = ClassRoom::all();
        $testTypes = TestType::orderBy('sort', 'asc')->get();

        $students = [];
        $scores = [];
        if (isset($query['school_year_id']) && isset($query['class_room_id']) && isset($query['test_type_id'])) {
            $students = Student::where('class_room_id', $query['class_room_id'])->get();
            $scores = $this->model->where([
                'class_roon_id' => $query['class_room_id'],
                'test_type_id' => $query['test_type_id'],
                'subject_id' => $user->subject_id,
            ])->get()->pluck('value', 'student_id');
        }

        return view($this->view.'index', compact('schoolYears', 'classRooms', 'testTypes', 'query', 'students', 'scores'));
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $user = auth($this->guard)->user();
            $payload = $request->only('test_type_id', 'class_room_id', 'scores');
            foreach ($payload['scores'] as $r) {
                $where = $r;
                $where['class_roon_id'] = $payload['class_room_id'];
                $where['test_type_id'] = $payload['test_type_id'];
                $where['subject_id'] = $user->subject_id;
                unset($where['value']);

                $this->model->updateOrCreate($where, [ 'value' => $r['value'] ]);
            }

            DB::commit();
            session()->flash('success', 'Berhasil di simpan');
            return redirect()->route($this->route.'index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
