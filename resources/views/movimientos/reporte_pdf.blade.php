<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Movimientos - Kardex</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
        h2 { text-align: center; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 6px; text-align: left; }
        th { background: #f0f0f0; }
        .footer { margin-top: 30px; font-size: 11px; text-align: right; color: #666; }
    </style>
</head>
<body>
    <h2>Informe de Movimientos (Kardex)</h2>
    <p><strong>Fecha de generación:</strong> {{ $fecha }}</p>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Insumo</th>
                <th>Cantidad</th>
                <th>Ubicación</th>
                <th>Usuario</th>
                <th>Motivo</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movimientos as $m)
                <tr>
                    <td>{{ $m->fecha_movimiento }}</td>
                    <td>{{ $m->tipo->nombre }}</td>
                    <td>{{ $m->insumo->nombre }}</td>
                    <td style="color: {{ $m->tipo->signo == 1 ? 'green' : 'red' }}">
                        {{ $m->tipo->signo == 1 ? '+' : '-' }}{{ $m->cantidad }}
                    </td>
                    <td>{{ $m->ubicacion->nombre ?? '-' }}</td>
                    <td>{{ $m->usuario->nombre ?? '-' }}</td>
                    <td>{{ $m->motivo ?? '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="7" align="center">No se encontraron movimientos</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Sistema de Inventario Inmunolab — {{ now()->year }}
    </div>
</body>
</html>
