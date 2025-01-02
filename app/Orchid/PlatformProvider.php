<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Manage Rooms')
                ->icon('bs.house') // Example icon for "Rooms" (replace as needed)
                ->title('Rooms')
                ->route('platform.rooms'),

            Menu::make('Manage Bookings')
                ->icon('bs.calendar-check') // Example icon for "Bookings" (replace as needed)
                ->title('Bookings')
                ->route('platform.systems.bookings'),

            Menu::make('Manage Stock')
                ->icon('bs.box') // Example icon for "Stock" (replace as needed)
                ->title('Stock')
                ->route('platform.systems.stock'),

            Menu::make('Manage Restaurant Order')
                ->icon('bs.basket') // Example icon for restaurant order
                ->title('Restaurant Order')
                ->route('platform.systems.restaurant-order'),
            

            Menu::make(__('Users'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access Controls')),

            Menu::make(__('Admins'))
                ->icon('bs.people')
                ->route('platform.systems.admin')
                ->permission('platform.systems.admins'),

            Menu::make(__('Staff'))
                ->icon('bs.people')
                ->route('platform.systems.staff')
                ->permission('platform.systems.staff'),

            Menu::make(__('Roles'))
                ->icon('bs.shield')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.rooms', __('Rooms'))
                ->addPermission('platform.systems.roomsaddedfacilities', __('Rooms Added Facilities'))
                ->addPermission('platform.systems.users', __('Users'))
                ->addPermission('platform.systems.admins', __('Admins'))
                ->addPermission('platform.systems.staff', __('Staff')),
        ];
    }
}
