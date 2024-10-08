<?php

namespace App\DataTables;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MenuItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $edit = "<a href='" . route('admin.menu-item.edit', $query->id) . "' class='btn-yellow'><i class='fa fa-edit'></i></a>";
                $delete = "<a href='" . route('admin.menu-item.destroy', $query->id) . "' class='btn-red mx-2 delete-item'><i class='fa fa-trash'></i></a>";

                $more = '<div class="dropstart d-inline">
                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="'. route("admin.menuSize.show", $query->id) .'">Menu Size & Options</a></li>
                            </ul>
                        </div>';

                return $edit . $delete . $more;
            })
            ->addColumn('price', function ($query) {
                return '₱' . $query->price;
            })
            ->addColumn('offer_price', function ($query) {
                return '₱' . $query->offer_price;
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    return '<span class="badge badge-primary fs-6">Active</span>';
                } else {
                    return '<span class="badge badge-danger fs-6">Inactive</span>';
                }
            })
            ->addColumn('show_at_home', function ($query) {
                if ($query->show_at_home == 1) {
                    return '<span class="badge badge-primary fs-6">Yes</span>';
                } else {
                    return '<span class="badge badge-danger fs-6">No</span>';
                }
            })
            ->addColumn('image', function ($query) {
                return '<img width="60px" src="' . $query->item_image . '">';
            })
            ->rawColumns(['offer_price', 'price', 'status', 'show_at_home', 'action', 'image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(MenuItem $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('menuitem-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
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
            Column::make('image'),
            Column::make('name'),
            Column::make('price'),
            Column::make('offer_price'),
            Column::make('show_at_home'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'MenuItem_' . date('YmdHis');
    }
}
