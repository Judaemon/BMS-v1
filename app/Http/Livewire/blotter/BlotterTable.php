<?php

namespace App\Http\Livewire\Blotter;

use App\Models\Blotter;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class BlotterTable extends PowerGridComponent
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
                ->caption('Add Blotter')
                ->class('bg-blue-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
                ->openModal('blotter.add-blotter', []),
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
    * @return Builder<\App\Models\Blotter>
    */
    public function datasource(): Builder
    {
        return Blotter::query();
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
            ->addColumn('status')
            ->addColumn('incident_type')
            ->addColumn('incident_location')
            ->addColumn('meeting_schedule_date_time_formatted', fn (Blotter $model) => Carbon::parse($model->meeting_schedule_date_time)->format('d/m/Y'));
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

            Column::make('STATUS', 'status')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('INCIDENT TYPE', 'incident_type')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('INCIDENT LOCATION', 'incident_location')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('SCHEDULE DATE TIME', 'meeting_schedule_date_time_formatted', 'meeting_schedule_date_time')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

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
     * PowerGrid Blotter Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        if ($this->tableName == 'BlotterScheduleTable') {
            return [
                Button::add('edit-modal')
                ->caption('Edit')
                ->class('bg-blue-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
                ->openModal('blotter.edit-blotter', ['id']),
    
                Button::add('view-modal')
                    ->caption('View')
                    ->class('bg-green-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
                    ->openModal('blotter.view-blotter', ['id']),
            ];
        }

       return [
            Button::add('edit-modal')
            ->caption('Edit')
            ->class('bg-blue-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
            ->openModal('blotter.edit-blotter', ['id']),

            Button::add('delete-modal')
            ->caption('Delete')
            ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
            ->openModal('blotter.delete-blotter', ['id']),

            Button::add('view-modal')
                ->caption('View')
                ->class('bg-green-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
                ->openModal('blotter.view-blotter', ['id']),
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
     * PowerGrid Blotter Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($blotter) => $blotter->id === 1)
                ->hide(),
        ];
    }
    */
}
