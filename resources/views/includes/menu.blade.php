<div class="card border-primary mb-3">
    <div class="card-header">Menú</div>

    <div class="card-body">

        <div class="list-group">
            @if (auth()->check())
            <a href="{{ url('/home') }}" class="list-group-item @if(request()->is('home')) active @endif">
                Inicio
            </a>
            <a href="{{ url('/calendar') }}" class="list-group-item @if(request()->is('calendar')) active @endif">
                Calendario
            </a>
            <a href="{{ url('/crearevento') }}" class="list-group-item @if(request()->is('crearevento')) active @endif">
                Crear Evento
            </a>
            <a href="{{ url('/listaeventos') }}" class="list-group-item @if(request()->is('listaeventos')) active @endif">
                Editar Evento
            </a>

            <a href="{{ url('/agregarsala') }}" class="list-group-item @if(request()->is('agregarsala')) active @endif">
                Agregar Sala
            </a>

            <a href="{{ url('/informes') }}" class="list-group-item @if(request()->is('informes')) active @endif">
                Informes
            </a>


            @else
            <a href="{{ url('/home') }}" class="list-group-item list-group-item">
                Inicio
            </a>
            @endif
        </div>
    </div>
</div>
