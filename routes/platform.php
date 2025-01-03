<?php

declare(strict_types=1);

use App\Orchid\Screens\Admins\AdminsEditScreen;
use App\Orchid\Screens\Admins\AdminsListScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Restaurant\RestaurantOrderListScreen;
use App\Orchid\Screens\Restaurant\RestaurantPlaceOrderListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\RoomBooking\BookingListScreen;
use App\Orchid\Screens\RoomBooking\RoomAvailabilityListScreen;
use App\Orchid\Screens\Rooms\bill;
use App\Orchid\Screens\Rooms\RoomListScreen;
use App\Orchid\Screens\Rooms\RoomViewScreen;
use App\Orchid\Screens\Staff\StaffEditScreen;
use App\Orchid\Screens\Staff\StaffListScreen;
use App\Orchid\Screens\Stock\StockListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));



Route::screen('admin/{user}/edit', AdminsEditScreen::class)
    ->name('platform.systems.admin.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.admin')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('admin/create', AdminsEditScreen::class)
    ->name('platform.systems.admin.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.admin')
        ->push(__('Create'), route('platform.systems.admin.create')));

// Platform > System > Users
Route::screen('admin', AdminsListScreen::class)
    ->name('platform.systems.admin')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Admins'), route('platform.systems.admin')));



Route::screen('staff/{user}/edit', StaffEditScreen::class)
    ->name('platform.systems.staff.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.staff')
        ->push($user->name, route('platform.systems.staff.edit', $user)));

// Platform > System > Users > Create
Route::screen('staff/create', StaffEditScreen::class)
    ->name('platform.systems.staff.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.staff')
        ->push(__('Create'), route('platform.systems.staff.create')));

// Platform > System > Users
Route::screen('staff', StaffListScreen::class)
    ->name('platform.systems.staff')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Staff'), route('platform.systems.staff')));







// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Platform > System > Roles
Route::screen('rooms', RoomListScreen::class)
    ->name('platform.rooms')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('All Rooms Management', route('platform.rooms')));


Route::screen('rooms/{id}', RoomViewScreen::class)
    ->name('platform.rooms.view')
    ->breadcrumbs(fn (Trail $trail , $id) => $trail
        ->parent('platform.rooms')
        ->push('Room -'. $id->number, route('platform.rooms.view', $id)));


Route::screen('rooms/{id}/bill', bill::class)
    ->name('platform.rooms.bill')
    ->breadcrumbs(fn (Trail $trail , $id) => $trail
        ->parent('platform.rooms')
        ->push('Room -'. $id->number, route('platform.rooms.bill', $id)));


// Platform > System > Room Bookings
Route::screen('bookings', BookingListScreen::class)
->name('platform.systems.bookings')
->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Bookings Management'), route('platform.systems.bookings')));


// Platform > System > Room Availability
Route::screen('room-availability/{checkin}/{checkout}', RoomAvailabilityListScreen::class)
    ->name('platform.systems.room-availability')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.bookings')
        ->push(__('Room Availability'), route('platform.systems.bookings')));



// Platform > System > Room Bookings
Route::screen('stock', StockListScreen::class)
    ->name('platform.systems.stock')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Stock Management'), route('platform.systems.stock')));


// Platform > System > Room Bookings
Route::screen('restaurant-order', RestaurantOrderListScreen::class)
    ->name('platform.systems.restaurant-order')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Restaurant Order Management'), route('platform.systems.restaurant-order')));


// Platform > System > Room Bookings
Route::screen('restaurant-place-order', RestaurantPlaceOrderListScreen::class)
    ->name('platform.systems.restaurant-place-order')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.restaurant-order')
        ->push(__('Place New Order'), route('platform.systems.restaurant-place-order')));



Route::screen('/examples/form/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/examples/form/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/examples/form/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/examples/form/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/examples/grid', ExampleGridScreen::class)->name('platform.example.grid');
Route::screen('/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
