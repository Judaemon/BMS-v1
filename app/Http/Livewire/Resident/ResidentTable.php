<?php

namespace App\Http\Livewire\Resident;

use App\Models\Resident;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent, WithPagination};

final class ResidentTable extends PowerGridComponent
{
    use ActionButton;

    public $delete_id;
    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->tableName = 'ResidentTable';

        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function header(): array
    {
        return [
            Button::add('new-modal')
                ->caption('Add resident')
                ->class('bg-blue-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
                ->openModal('resident.add-resident', []),
        ];
    }
    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Resident>
    */
    public function datasource(): Builder
    {
        return Resident::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('lastname')
            ->addColumn('firstname')
            ->addColumn('mobile_no')
            ->addColumn('email');
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('RESIDENT ID', 'id')
                ->sortable()
                ->makeInputRange(),

            Column::make('FIRSTNAME', 'firstname')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('LASTNAME', 'lastname')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('MOBILE NO', 'mobile_no')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('EMAIL', 'email')
                ->sortable()
                ->searchable()
                ->makeInputText(),
        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Resident Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
       return [
            Button::add('edit-modal')
                ->caption('Edit')
                ->class('bg-blue-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
                ->openModal('resident.edit-resident', ['id' => 'id']),

            Button::make('destroy', 'Delete')
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
                ->emit('residentDeleteConfirmation', ['deleteID' => 'id']),
                // ->method('delete'),
                // ->route('residents.destroy', ['resident' => 'id'])
       
            Button::add('view-modal')
                ->caption('View')
                ->class('bg-blue-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
                ->openModal('resident.view-resident', ['id' => 'id']),

            // https://livewire-powergrid.com/#/table/detail-row
            // Button::add('toggle-detail')
            //     ->caption('Toggle Detail')
            //     ->toggleDetail(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Resident Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($Resident) => $Resident->id === 1)
                ->hide(),
        ];
    }
    */

    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(), 
            [
                'residentDeleteConfirmation',
                'deleteResident' => 'deleteResident'
            ]);
    }

    public function residentDeleteConfirmation($deleteID)
    {
        $this->delete_id = $deleteID['deleteID'];

        $this->dispatchBrowserEvent('swal-confirm', [
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'icon' => 'warning',
            'showCancelButton' => 'true',
            'confirmButtonText' => 'Yes, delete it!',
            'cancelButtonText' => 'No, cancel!',
            'reverseButtons' => 'true',
        ]);
    }

    public function deleteResident()
    {
        Resident::where('id', $this->delete_id)->delete();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Deleted!',
            'text' => "Deleted successfully!",
            'icon' => 'success',
            'timer' => 2000,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            // 'showCancelButton' => 'true',
            // 'confirmButtonText' => 'Yes, delete it!',
            // 'cancelButtonText' => 'No, cancel!',
            // 'reverseButtons' => 'true'
        ]);
    }
}
