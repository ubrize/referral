<?php

namespace Ubrize\Referral;

use Illuminate\Support\ServiceProvider;

class ReferralServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->publishConfig();
        $this->publishMigration();
    }

    /**
     * Publish configuration
     */
    protected function publishConfig()
    {
        $this->publishes([
            realpath(__DIR__ . '/config/referral.php') => config_path('referral.php'),
        ]);
    }

    /**
     * Publish migration
     */
    protected function publishMigration()
    {
        $published_migration = glob(database_path('/migrations/*_create_referral_visits_table.php'));
        if (count($published_migration) === 0) {
            $this->publishes([
                __DIR__ . '/database/migrations/conversions.stub' => database_path('/migrations/' . date('Y_m_d_His') . '_create_referral_conversions_table.php'),
                __DIR__ . '/database/migrations/visits.stub' => database_path('/migrations/' . date('Y_m_d_His') . '_create_referral_visits_table.php'),
            ], 'migrations');
        }
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/referral.php', 'referral'
        );
    }
}
