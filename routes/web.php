<?php
use Illuminate\Support\Facades\Route;

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
Route::group(['middleware' => ['web']], function() {
    // // // public
    Route::get('/', [
        'uses' => 'PageController@RunIndex',
        'as' => 'index'
    ]);
    Route::get('/news', [
        'uses' => 'ServiceController@Run',
        'as' => 'page/news'
    ]);
    Route::get('/news/view/{id}', [
        'uses' => 'ServiceController@RunView',
        'as' => 'page/news/view'
    ]);

    Route::get('/items', [
        'uses' => 'ItemController@Run',
        'as' => 'items'
    ]);
    Route::get('/items/share', [
        'uses' => 'ItemController@RunShare',
        'as' => 'items/share'
    ]);
    Route::get('/items/category/{id}', [
        'uses' => 'ItemController@RunItemsCategory',
        'as' => 'items/category'
    ]);

    Route::get('/item/view/{id}', [
        'uses' => 'ItemController@RunView',
        'as' => 'item/view'
    ]);

    Route::get('/items/search', [
        'uses' => 'ItemController@RunSearch',
        'as' => 'items/search'
    ]);

    Route::get('/contacts', [
        'uses' => 'ContactController@Run',
        'as' => 'contact'
    ]);

    Route::any('/send_mail/', [
        'uses' => 'ContactController@SendEmail',
    ])->name('send_mail');

    Route::any('/create_order/', [
        'uses' => 'MailController@CreateOrder',
    ])->name('create_order');

    Route::get('/about', [
        'uses' => 'OnePageController@PageAbout'
    ])->name('page/about');
    Route::get('/service', [
        'uses' => 'OnePageController@PageService'
    ])->name('page/service');
    Route::get('/bicycle_cosmetics', [
        'uses' => 'OnePageController@PageBicycleCosmetics',
    ]);
    Route::get('/instruments', [
        'uses' => 'OnePageController@PageInstruments',
    ]);

    Route::get('/partners', [
        'uses' => 'PartnerController@Page'
    ])->name('page/partners');

    // // // admin panel

    Route::get('/admin', function () {
        return view('admin.login');
    })->middleware('redirect-auth-admin')->name('admin/index');
    Route::get('/admin/main', function () {
        return view('admin.main');
    })->name('admin/main')->middleware('is-admin');

    // // //items
    Route::get('/admin/items', [
        'uses' => 'admin\ItemController@Run',
        'as' => 'admin/items'
    ])->middleware('is-admin');
    Route::get('/admin/items/add', [
        'uses' => 'admin\ItemController@AddPage',
        'as' => 'item/add_page'
    ])->middleware('is-admin');
    Route::get('/admin/items/edit/{id}', [
        'uses' => 'admin\ItemController@RunEdit',
        'as' => 'item/edit_page'
    ])->middleware('is-admin');
    Route::get('/admin/items/search', [
        'uses' => 'admin\ItemController@SearchPage',
        'as' => 'admin/items/search'
    ])->middleware('is-admin');

    Route::post('/admin/item/add', [
        'uses' => 'admin\ItemController@Add',
        'as' => 'item/add'
    ])->middleware('is-admin');
    Route::post('/admin/item/edit', [
        'uses' => 'admin\ItemController@Edit',
        'as' => 'item/edit'
    ])->middleware('is-admin');
    Route::post('/admin/item/delete', [
        'uses' => 'admin\ItemController@Delete',
        'as' => 'item/delete'
    ])->middleware('is-admin');
    Route::post('/admin/item/edit_main_image', [
        'uses' => 'admin\ItemController@EditMainImage',
        'as' => 'item/edit_main_image'
    ])->middleware('is-admin');

    // // //images
    Route::post('/admin/images_item/add', [
        'uses' => 'admin\ImageItemController@AddImage',
        'as' => 'images_item/add'
    ])->middleware('is-admin');
    Route::post('/admin/image_item/delete', [
        'uses' => 'admin\ImageItemController@Delete',
        'as' => 'images_item/delete'
    ])->middleware('is-admin');

    // // //categories
    Route::get('/admin/categories', [
        'uses' => 'admin\CategoryController@Run',
        'as' => 'categories/main'
    ]);
    Route::get('/admin/categories/add', [
        'uses' => 'admin\CategoryController@AddPage',
        'as' => 'categories/add_page'
    ])->middleware('is-admin');
    Route::get('/admin/categories/update/{id}', [
        'uses' => 'admin\CategoryController@UpdatePage',
        'as' => 'categories/update_page'
    ])->middleware('is-admin');
    Route::post('/admin/category/add', [
        'uses' => 'admin\CategoryController@Add',
        'as' => 'category/add'
    ])->middleware('is-admin');
    Route::post('/admin/category/update', [
        'uses' => 'admin\CategoryController@Update',
        'as' => 'category/update'
    ])->middleware('is-admin');
    Route::get('/admin/category/delete/{id}', [
        'uses' => 'admin\CategoryController@Delete',
        'as' => 'category/delete'
    ])->middleware('is-admin');

    // // //news
    Route::get('/admin/services', [
        'uses' => 'admin\ServiceController@Run',
        'as' => 'admin/services'
    ])->middleware('is-admin');
    Route::get('/admin/services/add', [
        'uses' => 'admin\ServiceController@RunAdd',
        'as' => 'services/add_page'
    ])->middleware('is-admin');
    Route::get('/admin/services/search', [
        'uses' => 'admin\ServiceController@RunSearch',
        'as' => 'services/search'
    ])->middleware('is-admin');
    Route::get('/admin/services/edit/{id}', [
        'uses' => 'admin\ServiceController@RunEdit',
        'as' => 'services/edit_page'
    ])->middleware('is-admin');
    Route::post('/admin/service/add', [
        'uses' => 'admin\ServiceController@Create',
        'as' => 'service/add'
    ])->middleware('is-admin');
    Route::post('/admin/service/edit', [
        'uses' => 'admin\ServiceController@Edit',
        'as' => 'service/edit'
    ])->middleware('is-admin');
    Route::post('/admin/service/delete', [
        'uses' => 'admin\ServiceController@Delete',
        'as' => 'service/delete'
    ])->middleware('is-admin');

    // // //edit pass
    Route::post('/admin/setting/edit_pass', [
        'uses' => 'UserController@EditPass',
    ])->middleware('is-admin');

    // // //contacts
    Route::post('/admin/contacts/get', [
        'uses' => 'admin\ContactController@Get',
        'as' => 'contacts/get'
    ])->middleware('is-admin');
    Route::post('/admin/contacts/update', [
        'uses' => 'admin\ContactController@Update',
        'as' => 'contacts/update'
    ])->middleware('is-admin');

    // // //one pages
    Route::get('/admin/page/{id}', [
        'uses' => 'admin\OnePageController@Page',
        'as' => 'admin/page/get'
    ])->middleware('is-admin');
    Route::post('/admin/page/update', [
        'uses' => 'admin\OnePageController@Update',
        'as' => 'admin/page/update'
    ])->middleware('is-admin');

    // // //partners
    Route::get('/admin/partners', [
        'uses' => 'admin\PartnerController@Page',
        'as' => 'admin/partners'
    ])->middleware('is-admin');
    Route::get('/admin/partners/create', [
        'uses' => 'admin\PartnerController@PageCreate',
        'as' => 'admin/partners/create'
    ])->middleware('is-admin');
    Route::get('/admin/partners/update/{id}', [
        'uses' => 'admin\PartnerController@PageUpdate',
        'as' => 'admin/partners/update'
    ])->middleware('is-admin');
    Route::post('/admin/partner/update', [
        'uses' => 'admin\PartnerController@Update',
        'as' => 'admin/partner/update'
    ])->middleware('is-admin');
    Route::post('/admin/partner/create', [
        'uses' => 'admin\PartnerController@Create',
        'as' => 'admin/partner/create'
    ])->middleware('is-admin');
    Route::get('/admin/partner/delete/{id}', [
        'uses' => 'admin\PartnerController@Delete',
        'as' => 'admin/partner/delete'
    ])->middleware('is-admin');

    // // //slides
    Route::get('/admin/slides', [
        'uses' => 'admin\SlideController@Page',
        'as' => 'admin/slides'
    ])->middleware('is-admin');
    Route::get('/admin/slides/create', [
        'uses' => 'admin\SlideController@PageCreate',
        'as' => 'admin/slides/create'
    ])->middleware('is-admin');
    Route::get('/admin/slides/update/{id}', [
        'uses' => 'admin\SlideController@PageUpdate',
        'as' => 'admin/slides/update'
    ])->middleware('is-admin');
    Route::get('/admin/slide/delete/{id}', [
        'uses' => 'admin\SlideController@Delete',
        'as' => 'admin/slide/delete'
    ])->middleware('is-admin');
    Route::post('/admin/slide/create', [
        'uses' => 'admin\SlideController@Create',
        'as' => 'admin/slide/create'
    ])->middleware('is-admin');
    Route::post('/admin/slide/update', [
        'uses' => 'admin\SlideController@Update',
        'as' => 'admin/slide/update'
    ])->middleware('is-admin');

    // // //text pages
    Route::post('/admin/text_page/get', [
        'uses' => 'admin\TextPageController@Get',
        'as' => 'text_page/get'
    ])->middleware('is-admin');
    Route::post('/admin/text_page/update', [
        'uses' => 'admin\TextPageController@Update',
        'as' => 'text_page/update'
    ])->middleware('is-admin');

    // // //upload files
    Route::get('/admin/upload_files', [
        'uses' => 'admin\FileUploadController@Run'
    ])->name('admin/upload_files');
    Route::post('/admin/upload_file/add', [
        'uses' => 'admin\FileUploadController@Add'
    ])->name('upload_files/add');
    Route::post('/admin/upload_file/delete', [
        'uses' => 'admin\FileUploadController@Delete'
    ])->name('upload_files/delete');
    Route::get('/admin/upload_file/search', [
        'uses' => 'admin\FileUploadController@Search'
    ])->name('upload_files/search');

    // // //images upload
    Route::post('/admin/image/upload', [
        'uses' => 'admin\ImageController@Upload',
        'as' => 'admin/images/upload'
    ])->middleware('is-admin');
    Route::post('/admin/image/delete', [
        'uses' => 'admin\ImageController@Delete',
        'as' => 'admin/images/delete'
    ])->middleware('is-admin');

    // // //user
    Route::post('/admin/sign_in', [
        'uses' => 'UserController@SignIn',
        'as' => 'admin/sign_in'
    ]);
    Route::get('/exit', [
        'uses' => 'UserController@SignOut',
    ]);
});
