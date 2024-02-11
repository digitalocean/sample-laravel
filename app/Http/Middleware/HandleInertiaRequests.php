<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array {
                
        // return [
        //     ...parent::share($request),
        //     'auth' => [
        //         'user' => $request->user(),
        //         'role' => $request->session()->get('role'),
        //     ],
        //     // 'role' => [
                
        //     // ],
        //     // 'ziggy' => fn () => [
        //     //     ...(new Ziggy)->toArray(),
        //     //     'location' => $request->url(),
        //     // ],
        // ];

        return array_merge(parent::share($request), [
            // Synchronously...
            'appName' => config('app.name'),

            // Lazily...
            'auth.user' => fn () => $request->user()
                ? $request->user()->only('id', 'name', 'email', 'partner_id')
                : null,

            'role' => fn () => $request->session()->get('role')
        ]);
    }
}
