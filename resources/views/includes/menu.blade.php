<div class="card border-primary mb-3">
       <div class="card-header">Menú</div>

    <div class="card-body">
       
        <div class="list-group">
            @if (auth()->check())
            <a href="{{ url('/home') }}" class="list-group-item list-group-item">
                Inicio
            </a>
            <a href="{{ url('/calendar') }}" class="list-group-item list-group-item">
                Calendario
            </a>
            <a href="{{ url('/crearevento') }}" class="list-group-item list-group-item">
                Crear Evento
            </a>
            <a href="{{ url('/listaeventos') }}" class="list-group-item list-group-item">
                Editar Evento
            </a>
            <a href="#" class="list-group-item list-group-item">
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
