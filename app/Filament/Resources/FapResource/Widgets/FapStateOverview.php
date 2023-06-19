<?php

namespace App\Filament\Resources\FapResource\Widgets;

use App\Models\Fap;
use App\Models\Region;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class FapStateOverview extends BaseWidget
{
    // protected function getCards(): array
    // {
    //     $batken=Region::where('region','Баткен')->withCount('fap')->first();
    //     $ja=Region::where('region','Жалал-Абад')->withCount('fap')->first();
    //     $naryn=Region::where('region','Нарын')->withCount('fap')->first();
    //     $osh=Region::where('region','Ош')->withCount('fap')->first();
    //     $tls=Region::where('region','Талас')->withCount('fap')->first();
    //     $chui=Region::where('region','Чуй')->withCount('fap')->first();
    //     $ik=Region::where('region','Иссык-Куль')->withCount('fap')->first();



    //     return [
    //                 Card::make('Всего ФАПов',Fap::all()->count()),
    //                 Card::make('ФАПов в '.$batken->region .'ской области' ,$batken->fap_count),
    //                 Card::make('ФАПов в '.$ja->region .'ской области' ,$ja->fap_count),
    //                 Card::make('ФАПов в '.$naryn->region .'ской области' ,$naryn->fap_count),
    //                 Card::make('ФАПов в '.$osh->region .'ской области' ,$osh->fap_count),
    //                 Card::make('ФАПов в '.$tls->region .'ской области' ,$tls->fap_count),
    //                 Card::make('ФАПов в '.$chui->region .'ской области' ,$chui->fap_count),
    //                 Card::make('ФАПов в '.$ik->region .'ской области' ,$ik->fap_count),
    //     ];
    // }
}
