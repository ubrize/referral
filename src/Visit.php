<?php

namespace Ubrize\Referral;

use Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Visit extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at',
    ];

    /**
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('referral.visits_table_name'));
    }

    /**
     * Scope a query to only include previous visits.
     *
     * @param Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePreviousVisits($query)
    {
        return $query->where('cookie_token', Cookie::get(config('referral.cookie_name')));
    }
}
