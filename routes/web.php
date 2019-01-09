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

/*
http://localhost/animales/public/foo
http://localhost/animales/public/admin/users
http://localhost/animales/public/dashboard
http://localhost/animales/public/dashboardMX
http://localhost/animales/public/user/2/name
http://localhost/animales/public/user/2/name/nombre
 
 */
use App\Charlas;
$charla1 = new Charlas( ['title'=>'Test', 'premium'=>'TRUE'] );

$charlas = collect([
    new Charlas( ['title'=>'Entrenamiento profecional defencivo', 'premium'=>TRUE] ),
    new Charlas(['title'=>'Primera Mascota', 'premium'=>FALSE]),
    new Charlas(['title'=>'Alimento para Gatos exoticos', 'premium'=>TRUE]),
    new Charlas(['title'=>'Control de peso y alimentacion', 'premium'=>FALSE]),
    $charla1
]);

Route::get('/', function () {
    return view('welcome');
});


Route::get('bootstrap', function () {
    return view("bootstrap");
});

Route::get("/api/animals", function() {
    return response()->json([
        ['name' => 'dog'], 
        ['name' => 'cat'], 
        ['name' => 'elephant'], 
        ['name' => 'elk'], 
        ['name' => 'spider']
        ]);
});

Route::get('listado', function(){
    // $lista = App\Razas::lists('nombre','id');
    $users = \DB::table("razas")->pluck("nombre","id")->all();
    // $users = App\Razas::orderBy('nombre', 'ASC')->lists('nombre', 'id');
    dd($users);
});

Route::get('insertuser/{opcion}', function ($opcion) {
    if($opcion == 1){
        factory(App\User::class, 4)->create();
    }
    $userx = App\User::all();
    foreach ($userx as $datos){
        var_dump($datos->toArray());
    }
        
    return "Fin";
});

Route::get('charlas', function () use($charlas) {
    /* forma vieja...
    $premium = $charlas->filter(function ($charlas){
        return $charlas->premium;
    });
    
    $gratis = $charlas->reject(function ($charlas){
        return $charlas->premium;
    });
    */
    
    //en laravel 5.4 en adelante...
    /*
    $premium = $charlas->filter->premium;
    $gratis = $charlas->reject->premium;
    */
    $charlas->map->archive();
/*
    $premium = $charlas->filter->isPremium();
    $gratis = $charlas->reject->isPremium();
  */
    //resulto con el metodo partition
    list($premium, $gratis) = $charlas->partition->premium;
    
    dd($charlas->toArray(), $premium->toArray(), $gratis->toArray());
});

Route::get('razasW', function(){
    
    $razasx = App\Razas::find(3);
    $mascotas = $razasx->mascotas;
    $r4 = $razasx->where('id', 5)->get();
    
    return var_dump($mascotas->toArray()). var_dump($r4);
});


Route::get('orm', function () {
   // App\Mascota::find(5)->delete();
    
    $mascotaq = App\Mascota::where('id', 5)
                ->get();
    
    $mascota = App\Mascota::withTrashed()
                ->where('id', 5)
                ->get();
    
    return $mascotaq.$mascota;
});

Route::get('foo', function () {
    $resultados = DB::select("Select * from mascotas ");
    $datos = 'Resultados ';
    
    foreach ($resultados as $mascota){
        $date = date_create($mascota->fechaNacimiento);
        
        $datos .= "<div style='color:red'>".$mascota->id." - ".
                $mascota->nombre." - ". 
                date_format($date, 'd-m-Y')."</div><br>";
    }
    return 'Hello World ... '.$datos;
});
Route::get('user/{id}/name/{name?}', function ($id, $name=null) {
    return 'User '.($id * 2).' nombre '.strtoupper($name);
});

Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
   return 'post '.$postId.' comentario '.$commentId;
})->where(['post' => '[0-9]+', 'comment' => '[a-z]+']);

Route::get('username/{name?}', function ($name = null) {
    return 'el nombres solo permite a-z minusculas... mi nombre es '.$name;
})->where('name','[a-z]+');

Route::get('user/profile', function () {
    return '<h3>3 user profile</h3> <h2>2 perfil</h2>  <h1>1 perfil</h1>';
})->name('perfil');

Route::get('dashboard', ['middleware' => 'country:Argentina', function(){ 
    return '<h1>Bienvenido Argentina!!</h1>'; }]);
    
Route::get('dashboardMX', ['middleware' => 'country:Mexico', function(){ 
    return '<h1>Mexico!!</h1>'; }]);

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return '<h1> Prefijos /admin/users URL </h1>';
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'','middleware'=>['auth']], function(){
    Route::resource('agendas', 'AgendaController');
    Route::resource('clientes', 'ClienteController');
    Route::resource('razas', 'RazasController');
    Route::resource('mascotas', 'MascotaController');
    Route::resource('products', 'ProductController');
    Route::resource('usuarios', 'UsuariosController');
});
