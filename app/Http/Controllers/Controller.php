<?php

namespace App\Http\Controllers;

use App\departmentModel;
use App\equipmentsModel;
use App\scholasticModel;
use App\semesterModel;
use App\userModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\activityUserModel;
use App\activitiesModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $userLogin = Auth::user();
        View::share('userLogin', $userLogin);
    }

    public function showDashboard() {
        $activities = activitiesModel::all()->toArray();
        $departments = departmentModel::all()->toArray();
        $semesters = semesterModel::all()->toArray();
        $scholastics = scholasticModel::all()->toArray();
        $users = userModel::all()->toArray();
        $equipments = equipmentsModel::all()->toArray();
        return view('index', compact('activities','equipments', 'departments', 'semesters', 'scholastics', 'users'));
    }

    public function showLogin() {
        return view('login');
    }

    public function logout() {
        Auth::logout();
        return view('login');
    }

    public function login(Request $req) {
        $this->validate($req, [
            'account' => 'required',
            'password' => 'required'
        ], [
            'account.required' => 'Please input Account',
            'password.required' => 'Please input Password'
        ]);

        if (Auth::attempt(['account' => $req->input('account'), 'password' => $req->input('password')])) {
            $user = Auth::user();
            $typename = \App\typesUserModel::find($user->type_user)->name;
            if ($typename == 'student') {
                return redirect()->route('listActivitiesRegisted', $user->id);
            } elseif ($typename == 'admin' || $typename == 'manager') {
                return redirect('admin/dashboard')->with('user_id', $user->id);
            }
        } else {
            return redirect('login');
        }
    }

    public function showListStudents($id){
        $students = activityUserModel::all()->where('activity_id', $id)->toArray();
        return view('listStudents')->with('students', $students);
    }

    public function filterActivities($semesterId) {
        $activities = activitiesModel::all()->where('semester', $semesterId)->toArray();
        $departments = departmentModel::all();
        ?>
        <h2>Activities Statistical</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="width: 2.5%; text-align: center">No.</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Scholastic</th>
                    <th>Total Activities</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($departments)){
                    $count = 0;
                        foreach ($departments as $value):
                        $count++;
                    ?>
                    <tr>
                        <td style="text-align: center"><?php echo $count?></td>
                        <td><?php echo $value['name']?></td>
<!--                        <td>--><?php //echo \App\semesterModel::find($value['semester'])->name?><!--</td>-->
<!--                        <td>--><?php //echo \App\scholasticModel::find($value['scholastic'])->name?><!--</td>-->
                        <td><?php  ?></td>
                    </tr>
                    <?php endforeach;
                    } ?>
                </tbody>
            </table>
        </div>
    <?php
    }

}
