<?php

namespace App\Orchid\Screens\Stock;

use App\Models\KitchenItems;
use App\Models\KitchenItemsManage;
use App\Orchid\Layouts\Stock\StockListScreen as StockStockListScreen;
use Orchid\Alert\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout as FacadesLayout;
use Orchid\Support\Facades\Toast as FacadesToast;
use PhpParser\Node\Expr\AssignOp\Mod;

class StockListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $stock = KitchenItemsManage::with('item')
                ->filters()
                ->defaultSort('id', 'desc')
                ->get();
        

        return [
            'stocks' => $stock
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Stock Management';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [


            ModalToggle::make('In Stock')
                ->modalTitle('In Stock')
                ->modal('Stock')
                ->icon('bs.box-arrow-in-down') // Icon for adding stock (can be adjusted)
                ->method('InStock'),

            ModalToggle::make('Out Stock')
                ->modalTitle('Out Stock')
                ->modal('Stock')
                ->icon('bs.box-arrow-up') // Icon for reducing stock (can be adjusted)
                ->method('OutStock'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            
            StockStockListScreen::class,

            FacadesLayout::modal('Stock', [

                FacadesLayout::rows([
                    Select::make('item_id')
                        ->title('Item Name')
                        ->options(KitchenItems::all()->pluck('name', 'id'))
                        ->required(),

                    Input::make('quantity')
                        ->type('number')
                        ->title('Quantity')
                        ->required(),
                    
                ]),
            ]),
        ];
    }

    function InStock()
    {
        $item_id = request()->input('item_id');
        $quantity = request()->input('quantity');


        $item = KitchenItems::findOrFail($item_id);
        $item->now_stork += $quantity;
        $item->save();

        $history = new KitchenItemsManage();
        $history->item_id = $item_id;
        $history->unit = $item->unit;
        $history->stock = $quantity;
        $history->status = 'In';
        $history->save();


        FacadesToast::info('Stock added successfully');
    }

    function OutStock()
    {
        $item_id = request()->input('item_id');
        $quantity = request()->input('quantity');

        $item = KitchenItems::findOrFail($item_id);
        $item->now_stork -= $quantity;
        $item->save();

        $history = new KitchenItemsManage();
        $history->item_id = $item_id;
        $history->unit = $item->unit;
        $history->stock = $quantity;
        $history->status = 'Out';
        $history->save();

        FacadesToast::info('Stock reduced successfully');

    }
}
