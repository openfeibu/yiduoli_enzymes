<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Admin\CourseBaseResourceController as BaseController;
use App\Models\Course;
use App\Repositories\Eloquent\CourseCategoryRepository;
use App\Repositories\Eloquent\CourseRepository;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

/**
 * Resource controller class for page.
 */
class AwardsHonorResourceController extends BaseController
{
    /**
     * Initialize page resource controller.
     *
     * @param type CourseRepository $course
     * @param type CourseCategoryRepository $category
     */
    public function __construct(CourseRepository $course,
                                CourseCategoryRepository $category)
    {
        parent::__construct($course,$category);
        $this->category_slug = 'awards_honor';
        $this->main_url = 'course/awards_honor';
        $category_data = $category->where(['slug' => $this->category_slug])->first();
        $this->category_data = $category_data;
        $this->course_category_id = $category_data['id'];
        $this->repository = $course;
        $this->repository = $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function show(Request $request,Course $awards_honor)
    {
        return parent::show($request,$awards_honor);
    }
    public function update(Request $request,Course $awards_honor)
    {
        return parent::update($request,$awards_honor);
    }
    public function destroy(Request $request,Course $awards_honor)
    {
        return parent::destroy($request,$awards_honor);
    }

}