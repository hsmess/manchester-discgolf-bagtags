<?php

use App\Models\User;
use App\Notifications\EmailTagPos;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Bagtag;
use App\Http\Resources\Bagtag as BagtagResource;
use App\Http\Resources\User as UserResource;
use App\Http\Controllers\AssignController;
use Illuminate\Http\Request;
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
Route::get('/', function (){
    return Inertia::render('TwentyTwentyTwo', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'tags' => BagtagResource::collection(Bagtag::where('year',2022)->get()->sortBy('tag_number')),
        'users' => UserResource::collection(\App\Models\User::where('paid_2022',true)->get()->sortBy('name'))
    ]);
});



Route::get('/2021', function () {
//    return Inertia::render('BRB');
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'tags' => BagtagResource::collection(Bagtag::all()->sortBy('tag_number')),
        'users' => UserResource::collection(\App\Models\User::where('paid_2021',true)->get()->sortBy('name'))
    ]);
});

Route::get('/update-tag',function (Request $request){
    if($request->year == 2022)
    {
        $tag = Bagtag::where('tag_number',$request->tag)->where('year',2022)->get();


        return Inertia::render('ChangeTagTwentyTwo',[
            'tag' => BagtagResource::collection($tag)->first(),
            'users' => UserResource::collection(\App\Models\User::where('paid_2022',true)->get()->sortBy('name'))
        ]);
    }
});

//Route::get('/tmp', function () {
////    return Inertia::render('BRB');
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//        'tags' => BagtagResource::collection(Bagtag::all()->sortBy('tag_number')),
//        'users' => UserResource::collection(\App\Models\User::where('paid_2021',true)->get()->sortBy('name'))
//    ]);
//});
//Route::redirect('/','/register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/buy', function () {
    return Inertia::render('Pay');
})->name('buy');


Route::middleware(['auth:sanctum', 'verified'])->get('/thursday-night-league', function () {
    return Inertia::render('Thursday');
})->name('thursday');

Route::middleware(['auth:sanctum', 'verified'])->get('/ric-taylor-memorial', function () {
    return Inertia::render('Ric');
})->name('rictourney');

Route::get('/admin/assign', function (){
    $first = Bagtag::where('year',2022)->first();
    if($first == null)
    {
        $players = User::where('paid_2022',true)->get()->sortByDesc(function ($item){
            return $item->donation_amount;
        });
        //check if we already have tags for some reason...
        $first = DB::table('bagtags')->where('year',2022)->orderByDesc('created_at')->first();
        if($first != null)
        {
            $initial_tag = $first['tag_number'] + 1;
        }
        else{
            $initial_tag = 1;
        }
        $players->each(function ($item) use (&$initial_tag){
            $t = new Bagtag();
            $t->tag_number = $initial_tag;
            $t->year = 2022;
            $t->save();
            $initial_tag++;
            $item->bagtags()->attach($t);
            Log::info($item->name . ' Gets tag ' . $t->tag_number);
        });
    }
    else{
        $start_tag = Bagtag::where('year',2022)->orderByDesc('id')->first()->tag_number + 1;

        $users = \App\Models\User::where('paid_2022',true)->get()->filter(function ($item) {
            return $item->current_tag_position == "Unassigned";
        })->each(function ($item) use (&$start_tag){
            $t = new Bagtag();
            $t->tag_number = $start_tag;
            $t->year = 2022;
            $t->save();
            $start_tag++;
            $item->bagtags()->attach($t);
            Log::info($item->name . ' Gets tag ' . $t->tag_number);
            $user = $item->fresh();
            $user->notify(new EmailTagPos($user->current_tag_position));
        });
    }
});

Route::get('admin/qummec-duHboh-dexhy1/notify-everyone',function (){
    User::where('paid_2022',true)->get()->each(function ($user){
//        ray($user->current_tag_position);
        $user->notify(new EmailTagPos($user->current_tag_position));
    });
});


App\Models\User::where('paid_2022',true)->map(function ($item){return $item->currentTagPosition;});
