<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use App\Models\Domain;
class SeedTenantsAndDomainsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:seed-tenants-domains';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenantsData = [
            [
                'name' => 'Tenant 1',
            ],
            [
                'name' => 'Tenant 2',
            ],
        ];

        foreach ($tenantsData as $tenantData) {
            $tenant = Tenant::create($tenantData);

            $tenantDomains = [
                'dev-softpers.com',
                'tenant2.example.com',
            ];

            foreach ($tenantDomains as $domain) {
                Domain::create([
                    'domain' => $domain,
                    'tenant_id' => $tenant->id,
                ]);
            }
        }

        $this->info('Tenants and domains tables seeded successfully.');
    }

    }
