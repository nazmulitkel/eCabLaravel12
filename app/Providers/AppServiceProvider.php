<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Prettus\Repository\Generators\GeneratorsServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
     public function register(): void
    {
    //     //
     }

    // public function register()
    //     {
    // if ($this->app->bound(\App\Repositories\ProductRepository::class)) {
    //     $this->app->unbind(\App\Repositories\ProductRepository::class);
    //  }
    //    }


    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }
    
    public function boot()
        {
   // config([
        // 'repository.generator.paths.models' => 'Models',
        // 'repository.generator.stubs.model' => false,
        //  'repository.generator.paths.models' => 'Models', // Eloquent file কোথায় যাবে
        // 'repository.generator.paths.repositories' => 'Repositories', // Repository
        // 'repository.generator.paths.interfaces' => 'Repositories', 
        // 'repository.generator.paths.criteria' => 'Repositories/Criteria',
        // 'repository.generator.paths.tests' => 'tests/Repositories',
        // // এই config টি false করলে Eloquent file generate হবে না
        // 'repository.generator.stubs.model' => false,
                    // Eloquent model file generation বন্ধ
            // 'repository.generator.stubs.repositoryEloquent' => false,

            // 'repository.generator.stubs.model' => false,
            
            // 'repository.generator.stubs.entity' => false,

            // যদি আপনি চান, custom paths দিতে পারেন
            // 'repository.generator.paths.models' => 'Models',
            // 'repository.generator.paths.repositories' => 'Repositories',
            // 'repository.generator.paths.interfaces' => 'Repositories',
            // 'repository.generator.paths.criteria' => 'Repositories/Criteria',
            // 'repository.generator.paths.tests' => 'tests/Repositories',
  //  ]);
    }
}

