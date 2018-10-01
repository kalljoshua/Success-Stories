<?php

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

//guest routes

//index routes
Route::get('/', 'User\HomeController@index')->name('home');
Route::get('/admin', 'User\HomeController@index')->name('admin.login');
Route::get('admin', 'Admin\AuthenticationController@loginForm')->name('admin.login');

Route::get('contact-us', 'User\HomeController@contact')->name('user.contact');
Route::get('about-us', 'User\HomeController@about')->name('user.about');
Route::get('terms-and-conditions', 'User\HomeController@termsofUse')->name('user.termsofUse');
Route::get('Privacy', 'User\HomeController@privacy')->name('user.privacy');
Route::get('Personal-Safety', 'User\HomeController@personalsafety')->name('user.personalsafety');
Route::get('Disclaimer', 'User\HomeController@disclaimer')->name('user.disclaimer');
Route::get('faq', 'User\HomeController@faq')->name('user.faq');


//ajax routes
Route::get('/submission/getSubCategories/{id}', 'User\StoriesController@getSubCategories')->name('sub_categories');
//Route::get('loadsubcat/{id}', 'SubmissionController@secondMethod');

//stories routes
Route::get('story/{slug}', 'User\StoriesController@showStory')->name('user.show.story');
Route::post('comment', 'User\StoriesController@postComment')->name('user.comment.submit');
Route::get('stories', 'User\StoriesController@storyListing')->name('story.listings');
Route::get('/stories/{id}', 'User\StoriesController@storyCategory')->name('stories.category');
Route::get('videos', 'User\StoriesController@allVideos')->name('user.videos');

//search articles
Route::get('/search', 'User\SearchArticlesController@search')->name('article.search');


//user login routes
Route::get('comment', 'User\StoriesController@postComment')->name('user.login');

//user routes
Route::group(['middleware' => 'user'], function () {

});



/*
* Begining of Admin routes
*/
//login routes

Route::post('/admin/submit', 'Admin\AuthenticationController@login')->name('admin.login.submit');
Route::get('/admin/logout', 'Admin\AuthenticationController@logout')->name('admin.logout');

Route::get('/submission/getSubCategories/{id}', 'Admin\StoriesController@getSubCategories')->name('sub_categories');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', 'Admin\DashboardController@admin')->name('admin.dashboard');
    Route::get('/admin/compose', 'Admin\StoriesController@compose')->name('admin.compose');
    Route::post('/admin/compose', 'Admin\StoriesController@storySubmit')->name('admin.story.submit');
    Route::get('/admin/stories', 'Admin\StoriesController@adminStories')->name('admin.stories');
    Route::post('/admin/edit-story', 'Admin\StoriesController@adminEditStory')->name('admin.story.edit');
    Route::post('/admin/delete-story', 'Admin\StoriesController@adminDeleteStory')->name('admin.delete.story');
    Route::get('/admin/pending-stories', 'Admin\StoriesController@adminPendingStory')->name('admin.pending');

    //types
    Route::get('/admin/type', 'Admin\CategoryTypeController@typeForm')->name('admin.type');
    Route::get('/admin/types', 'Admin\CategoryTypeController@showAllType')->name('admin.types');
    Route::post('/admin/types', 'Admin\CategoryTypeController@addType')->name('admin.submit.type');
    Route::post('/admin/edit-types', 'Admin\CategoryTypeController@editSubmitType')->name('admin.edit.type');
    Route::post('/admin/delete-types', 'Admin\CategoryTypeController@destroyType')->name('admin.delete.type');
    Route::post('/admin/position-types', 'Admin\CategoryTypeController@positionType')->name('admin.type.position');

    //categories
    Route::get('/admin/category', 'Admin\CategoryTypeController@categoryForm')->name('admin.category');
    Route::get('/admin/categories', 'Admin\CategoryTypeController@showAllCategory')->name('admin.categories');
    Route::post('/admin/categories', 'Admin\CategoryTypeController@addCategory')->name('admin.submit.category');
    Route::post('/admin/edit-categories', 'Admin\CategoryTypeController@editCategory')->name('admin.edit.category');
    Route::post('/admin/delete-categories', 'Admin\CategoryTypeController@destroyCategory')->name('admin.delete.category');

    //sub categories
    Route::get('/admin/sub-category', 'Admin\CategoryTypeController@sub-categoryForm')->name('admin.sub-category');
    Route::get('/admin/sub-categories', 'Admin\CategoryTypeController@showAllSubCategory')->name('admin.sub-categories');
    Route::post('/admin/sub-categories', 'Admin\CategoryTypeController@addSubCategory')->name('admin.submit.sub-category');
    Route::post('/admin/edit-subcategories', 'Admin\CategoryTypeController@editSubCategorySubmit')->name('admin.edit.sub-category');
    Route::post('/admin/delete-subcategories', 'Admin\CategoryTypeController@destroySubCategory')->name('admin.delete.sub-category');

    //videos
    Route::get('/admin/video', 'Admin\VideosController@videoForm')->name('admin.video');
    Route::get('/admin/videos', 'Admin\VideosController@showAllVideos')->name('admin.videos');
    Route::post('/admin/videos', 'Admin\VideosController@addVideo')->name('admin.submit.video');
    Route::post('/admin/edit-videos', 'Admin\VideosController@editVideo')->name('admin.edit.video');
    Route::post('/admin/delete-videos', 'Admin\VideosController@destroyVideo')->name('admin.delete.video');

    //adverts
    Route::get('/admin/advert', 'Admin\AdvertsController@advertForm')->name('admin.advert');
    Route::get('/admin/adverts', 'Admin\AdvertsController@showAllAdvert')->name('admin.adverts');
    Route::post('/admin/adverts', 'Admin\AdvertsController@addAdvert')->name('admin.submit.advert');
    Route::post('/admin/edit-adverts', 'Admin\AdvertsController@editAdvert')->name('admin.edit.advert');
    Route::post('/admin/destroy-adverts', 'Admin\AdvertsController@destroyAdvert')->name('admin.destroy.advert');

    //Activate Advert
    Route::get('/admin/activate-advert', 'Admin\ActivateAdvertController@activateAdvert')->name('activate.advert');
    Route::get('/admin/get-activated-adverts', 'Admin\ActivateAdvertController@getActivatedAdverts')->name('activated.advert');


    //activate Story
    Route::get('/admin/activate-story', 'Admin\ActivateStoriesController@activateStory')->name('activate.story');
    Route::get('/admin/get-activated-stories', 'Admin\ActivateStoriesController@getActivatedStories')->name('activated.stories');

    //Trend Story
    Route::get('/admin/trend-story', 'Admin\AdminTrendStoriesController@trendStory')->name('trend.story');
    Route::get('/admin/get-trended-stories', 'Admin\AdminTrendStoriesController@getTrendedStories')->name('trended.stories');
    Route::get('/admin/story/{id}/untrend', 'Admin\AdminTrendStoriesController@untrendStory')->name('untrend.story');
});
