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
            
                @if (auth()->user()->is_admin)
                <a href="{{ url('/crearevento') }}" class="list-group-item @if(request()->is('crearevento')) active @endif">
                    Crear Evento
                </a>
                <a href="{{ url('/listaeventos') }}" class="list-group-item @if(request()->is('listaeventos')) active @endif">
                    Editar Evento
                </a>

                <a href="{{ url('/informes') }}" class="list-group-item @if(request()->is('informes')) active @endif">
                    Ver Informes
                </a>

                <ul class="list-group-item list-group-flush @if(request()->is('agregarsala')) active @endif @if(request()->is('agregarprofesor')) active @endif @if(request()->is('agregarasignatura')) active @endif">
                    <a class="nav-item dropdown">
                        <a class="nav-link- dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administrar</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/agregarsala">Administrar Salas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/agregarprofesor">Administrar Profesores</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/agregarasignatura">Administrar Asignaturas</a>
                        </div>
                    </a>

                </ul>
                @endif

            @else
            <a href="{{ url('/home') }}" class="list-group-item list-group-item">
                Inicio
            </a>
            @endif
        </div>
    </div>
</div>
