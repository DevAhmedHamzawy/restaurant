<?php

namespace App\DataTables;

use App\Models\Restaurant;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RestaurantsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.restaurants.action')
            ->addColumn('status', function($data) { return $data->status_value == 'open' ? '<span class="badge bg-primary">Open</span>' : '<span class="badge bg-danger">Closed</span>';  })
            ->editColumn('created_at', function($data){ $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y'); return $formatedDate; })
            ->addColumn('image', function($data) { return '<img src="'.$data->img_path.'" width="150" alt="" srcset="">'; })
            ->addColumn('delivery_time', function($data) { return $data->delivery_time_value; })
            ->addColumn('delivery_fees', function($data) { return $data->delivery_fees_value;  })
            ->rawColumns(['action', 'status', 'image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\RestaurantsDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Restaurant $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('restaurants-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('image'),
            Column::make('name'),
            Column::make('delivery_time'),
            Column::make('delivery_fees'),
            Column::make('address'),
            Column::computed('status')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
            Column::make('created_at')->text('Joined at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Restaurants_' . date('YmdHis');
    }
}
