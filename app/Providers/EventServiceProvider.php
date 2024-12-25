<?php

namespace App\Providers;

use App\Models\Buyer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\PaymentMethod;
use App\Observers\BuyerObserver;
use App\Observers\InvoiceObserver;
use App\Observers\InvoiceItemObserver;
use Illuminate\Auth\Events\Registered;
use App\Observers\PaymentMethodObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        $this->bootObservers();
    }

    private function bootObservers(): void
    {
        Invoice::observe(InvoiceObserver::class);
        InvoiceItem::observe(InvoiceItemObserver::class);
        Buyer::observe(BuyerObserver::class);
        PaymentMethod::observe(PaymentMethodObserver::class);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
