<td>
    {{ \Modules\Rental\Models\Station::find($entry->{$column['name']})->name }} -
    {{ \Modules\Rental\Models\Station::find($entry->{$column['name']})->city }}
</td>