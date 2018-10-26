<?php

namespace Ubrize\Referral;

use Illuminate\Database\Eloquent\Model;

trait TracksConversions
{
    /**
     * @return void
     */
    public static function bootTracksConversions()
    {
        static::created(function (Model $model) {
            $model->assignPreviousVisits();
        });
    }

    /**
     * @return mixed
     */
    public function visits()
    {
        return $this->morphToMany(Visit::class, 'convertible', config('referral.conversions_table_name'));
    }

    /**
     * Sync visits from the logged in user before they registered.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function assignPreviousVisits()
    {
        return $this->visits()->attach(Visit::previousVisits()->get());
    }

    /**
     * The initial attribution data that eventually led to a registration.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function initialAttributionData()
    {
        return $this->visits()->orderBy('created_at', 'asc')->first();
    }

    /**
     * The final attribution data before registration.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function finalAttributionData()
    {
        return $this->visits()->orderBy('created_at', 'desc')->first();
    }
}
