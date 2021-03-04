<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('welcome');
});
Route::get('/insert', function () {
    DB::insert('insert into student(name, date_of_birth, GPA, advisor) value("Nazgul", "2001-06-27", 2.80, "Ualikhan")');
});
Route::get('/update', function () {
    DB::update('update student set GPA="3.00" where id=1');
});
Route::get('/delete', function () {
    DB::delete('delete from student where id=1');
});
Route::get('/select', function () {
    $results=DB::select('select * from student where id=2');
    foreach ($results as $student) {
    	echo "Name: " .$student->name;
    	echo "<br>";
    	echo "Date of birth: " .$student->date_of_birth;
    	echo "<br>";
    	echo "GPA: " .$student->GPA;
    	echo "<br>";
    	echo "Advisor: " .$student->advisor;
    }
});



Route::get('/basicinsert', function () {
    $student = new Student;
    $student->name="Diana";
    $student->date_of_birth="2002-05-23";
    $student->GPA=3.48;
    $student->advisor="Marzhan";
    $student->save();
});


Route::get('/basicupdate', function () {
    $student = Student::find(2);
    $student->name="Moana";
    $student->date_of_birth="2001-05-13";
    $student->GPA=3.08;
    $student->advisor="Kurmangazy";
    $student->save();
});

Route::get('/destroy', function () {
    Student::destroy(2);
});



Route::get('/basicselect', function () {
    $students = Student::all();
    foreach ($students as $student) {

 echo "Name: " .$student->name;
    	echo "<br>";
    	echo "Date of birth: " .$student->date_of_birth;
    	echo "<br>";
    	echo "GPA: " .$student->GPA;
    	echo "<br>";
    	echo "Advisor: " .$student->advisor;

   }
});