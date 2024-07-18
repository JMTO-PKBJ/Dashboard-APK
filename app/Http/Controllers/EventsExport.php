<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EventsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Event::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'CCTV ID',
            'Waktu',
            'Lokasi',
            'Class',
            'Gambar'
        ];
    }
}
