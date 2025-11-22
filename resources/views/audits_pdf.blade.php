<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Auditoria</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <h1>Relatório Completo de Auditoria</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Modelo</th>
                <th>Ação</th>
                <th>Alterações</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($audits as $audit)
                <tr>
                    <td>{{ $audit->id }}</td>
                    <td>{{ $audit->user ? $audit->user->name : 'Sistema' }}</td>
                    <td>{{ class_basename($audit->auditable_type) }}</td>
                    <td>{{ $audit->event }}</td>
                    <td>
                        @if($audit->old_values || $audit->new_values)
                            <strong>Antes:</strong> {{ json_encode($audit->old_values) }} <br>
                            <strong>Depois:</strong> {{ json_encode($audit->new_values) }}
                        @endif
                    </td>
                    <td>{{ $audit->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
