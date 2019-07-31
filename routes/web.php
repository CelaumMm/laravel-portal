Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
	Route::get('/home', 'HomeController@index')->name('home');

	Auth::routes();
});

Route::get('/', function () {
    return view('welcome');
});
