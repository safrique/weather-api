@php
    use Spatie\Menu\Laravel\Facades\Menu;
    use Spatie\Menu\Link;

    Menu::macro('main', function () {
        return Menu::new()
            ->add(Link::to('/cities', 'Home')->addClass('active'))
            ->add(Link::to('/cities/find', 'Search City'))
            ->add(Link::to('/forecast', 'Forecasts'))
            ->setActiveFromRequest();
    })
@endphp

<nav class="navigation sticky">{!! Menu::main() !!}</nav>
