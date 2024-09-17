<?php

namespace App\DataTables;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VouchersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $edit = "<a href='" . route('admin.voucher.edit', $query->id) . "' class='btn-yellow me-2'><i class='fas fa-edit'></i></a>";
            $delete = "<a href='" . route('admin.voucher.destroy', $query->id) . "' class='btn-red delete-item'><i class='fas fa-trash'></i></a>";

            return $edit . $delete;

        })
        ->addColumn('status', function ($query) {
            if ($query->status == 1) {
                return '<span class="badge badge-primary fs-6">Active</span>';
            } else {
                return '<span class="badge badge-danger fs-6">Inactive</span>';
            }
        })
        ->rawColumns(['show_at_home', 'status', 'action'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Voucher $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vouchers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()

                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('code'),
            Column::make('discount_value'),
            Column::make('expiry_date'),
            Column::make('status'),


            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(120)
                  ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Vouchers_' . date('YmdHis');
    }
}
