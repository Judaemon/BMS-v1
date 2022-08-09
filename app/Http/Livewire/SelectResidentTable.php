<?php

namespace App\Http\Livewire;

use App\Models\Resident;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class SelectResidentTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
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
            ->addColumn('firstname')
            ->addColumn('middlename')
            ->addColumn('lastname')
            ->addColumn('suffix')
            ->addColumn('gender')
            ->addColumn('height')
            ->addColumn('prk_area');
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
            Column::make('ID', 'id')
                ->makeInputRange(),

            Column::make('FIRSTNAME', 'firstname')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('MIDDLENAME', 'middlename')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('LASTNAME', 'lastname')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('SUFFIX', 'suffix')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('GENDER', 'gender')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('HEIGHT', 'height')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('PRK AREA', 'prk_area')
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
           Button::make('select', 'select')
               ->class('bg-blue-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
               ->emit('addInvolvedResident', [
                   'resident_id' => 'id', 
                   'firstname' => 'firstname', 
                   'lastname' => 'lastname']),
                   
                // ->emit('residentSelected', [
                //     'resident_id' => 'id', 
                //     'firstname' => 'firstname', 
                //     'lastname' => 'lastname']),
            //    ->emit('residentSelected', ['selectedID' => 'id', 'firstname' => 'firstname', 'lastname' => 'lastname']),
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
                ->when(fn($resident) => $resident->id === 1)
                ->hide(),
        ];
    }
    */

    
}
