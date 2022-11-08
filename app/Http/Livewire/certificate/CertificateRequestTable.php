<?php

namespace App\Http\Livewire\Certificate;

use App\Models\CertificateRequest;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class CertificateRequestTable extends PowerGridComponent
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

    public function header(): array
    {
        return [
            Button::add('new-modal')
                ->caption('Add Certificate Request')
                ->class('bg-green-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
                ->openModal('certificate.add-certificate-request', []),
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
    * @return Builder<\App\Models\CertificateRequest>
    */
    public function datasource(): Builder
    {
        return CertificateRequest::query();
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
            ->addColumn('user_id')
            ->addColumn('certificate_type')
            ->addColumn('status')
            ->addColumn('certificate_signature');
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

            Column::make('USER ID', 'user_id')
                ->makeInputRange(),

            Column::make('CERTIFICATE TYPE', 'certificate_type')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('STATUS', 'status')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('CERTIFICATE SIGNATURE', 'certificate_signature')
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
     * PowerGrid CertificateRequest Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
       return [
        Button::add('edit-modal')
            ->caption('Edit')
            ->class('bg-blue-500 cursor-pointer text-white px-3 py-2 rounded flex justify-center text-sm')
            ->openModal('user.edit-user', ['id']),

        Button::add('delete-modal')
            ->caption('Delete')
            ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
            ->openModal('user.delete-user', ['id']),
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
     * PowerGrid CertificateRequest Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($certificate-request) => $certificate-request->id === 1)
                ->hide(),
        ];
    }
    */
}
