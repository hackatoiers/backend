<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #444;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }

        .photos {
            text-align: center;
            margin-bottom: 25px;
        }

        .photos img {
            height: 160px;
            width: auto;
            margin: 4px;
            border-radius: 6px;
            border: 1px solid #ccc;
            object-fit: cover;
        }

        .section {
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #222;
            margin-bottom: 8px;
            padding-bottom: 3px;
            border-bottom: 1px solid #ccc;
        }

        .detail {
            margin: 4px 0;
        }

        .label {
            font-weight: bold;
            color: #000;
        }

        .box {
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background: #f8f8f8;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Ficha do Item — #{{ $item->id }}</h1>
    <small>{{ $item->name }}</small>
</div>
<br />
{{-- Fotos do item --}}
@if ($item->photos->count())
    <div class="photos">
        @foreach ($item->photos as $photo)
            <img src="{{ \Illuminate\Support\Facades\Storage::path($photo->photo_url) }}">
        @endforeach
    </div>
@endif

{{-- Dados principais --}}
<div class="section">
    <div class="section-title">Informações Básicas</div>
    <div class="box">
        <div class="detail"><span class="label">Nome:</span> {{ $item->name }}</div>
        <div class="detail"><span class="label">Descrição:</span> {{ $item->description ?? '-' }}</div>
        <div class="detail"><span class="label">Número:</span> {{ $item->number ?? '-' }}</div>
    </div>
</div>

{{-- Dimensões --}}
<div class="section">
    <div class="section-title">Dimensões & Peso</div>
    <div class="box">
        <div class="detail"><span class="label">Comprimento:</span> {{ $item->length }} cm</div>
        <div class="detail"><span class="label">Altura:</span> {{ $item->height }} cm</div>
        <div class="detail"><span class="label">Largura:</span> {{ $item->width }} cm</div>
        <div class="detail"><span class="label">Peso:</span> {{ $item->weight }} g</div>
    </div>
</div>

{{-- Localização --}}
<div class="section">
    <div class="section-title">Classificação & Localização</div>
    <div class="box">
        <div class="detail"><span class="label">Localização:</span> {{ $item->location_id }}</div>
        <div class="detail"><span class="label">Coleção:</span> {{ $item->collection_id }}</div>
        <div class="detail"><span class="label">Subtipo:</span> {{ $item->subtype_id }}</div>
    </div>
</div>

{{-- Estado de conservação --}}
<div class="section">
    <div class="section-title">Conservação</div>
    <div class="box">
        <div class="detail"><span class="label">Integridade:</span> {{ $item->integrity }}</div>
        <div class="detail"><span class="label">Estado de Conservação:</span> {{ $item->conservation_state }}</div>
        <div class="detail"><span class="label">Detalhes:</span> {{ $item->conservation_detail }}</div>
    </div>
</div>

</body>
</html>
