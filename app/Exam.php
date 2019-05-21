<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
class Exam extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'faculty_id','department_id','fac_id','material_id','class_id','semester_id','year_id','fexam','views_num','key_search_ar','key_search_en','year_id'
    ];
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }
    public function _class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
    public function depart()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
//        \Debugbar::info('Start Material');
//        $object = $this->belongsTo(Material::class, 'material_id','id');
//        \Debugbar::info($object);
//        return $object;
    }
    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }
    public function hasYear()
    {
        return (isset($this->year));
    }
    public function hasFaculty()
    {
        return (isset($this->faculty));
    }
    public function hasSemester()
    {
        return (isset($this->semester));
    }
    public function hasMaterial()
    {
        return (isset($this->material));
    }
    public function hasClass()
    {
        return (isset($this->_class));
    }
    public function getClassName()
    {
        return ($this->hasClass()) ? $this->_class->name_ar : '';
    }
    public function getFaculty()
    {
        return ($this->hasFaculty()) ? $this->faculty->name_ar : '';
    }
    public function getMaterialName()
    {
        return ($this->hasMaterial()) ? $this->material->name_ar : '';
    }
    public function getSemesterName()
    {
        return ($this->hasSemester()) ? $this->semester->name_ar: '';
    }
    public function getYearName()
    {
        return ($this->hasYear()) ? $this->year->name : '';
    }
    public function getFullName()
    {
        return $this->getFaculty().'/'.$this->getClassName() .'/'.$this->getMaterialName().'/' . $this->getSemesterName() .'/'. $this->getYearName();
    }
    public function scopeSearch($q, $request)
    {
        if ($request->has('faculty_id') && !empty($request->faculty_id)) {
            $q->where('faculty_id', $request->faculty_id);
        }
        return $q;
    }
    public function facultyexam()
    {
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function files($name = null)
    {
        $files =\App\File::where('display_name',$name)->first();
        if($files){
            return $files->file_name;
        } else {
            return Null;
        }

    }

    public function tags(){
        return $this->hasMany(Tag::class,'tag_exams');
    }
}