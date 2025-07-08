@extends('layouts.app')

@section('content')
<div class="resources-container">
    <h2 class="resources-title">Available Resources</h2>

    <div class="resource-section">
        <h3 class="section-title">PDF Materials</h3>
        <div class="resource-grid">
            @forelse($materials as $material)
                <div class="resource-card">
                    <a href="{{ route('materials.show', $material->id) }}" class="resource-link">
                        <span class="resource-title">{{ $material->title }}</span>
                        <span class="resource-type">PDF</span>
                    </a>
                </div>
            @empty
                <p class="no-data">No PDF materials available.</p>
            @endforelse
        </div>
    </div>

    <div class="resource-section">
        <h3 class="section-title">Topic Notes</h3>
        <div class="resource-grid">
            @forelse($notes as $note)
                <div class="resource-card">
                    <a href="{{ route('materials.show', $note->id) }}" class="resource-link">
                        <span class="resource-title">{{ $note->title }} (Grade: {{ $note->grade->name ?? 'N/A' }})</span>
                        @if(json_decode($note->curriculum_ids, true))
                            <span class="resource-subtitle">Curricula: {{ implode(', ', json_decode($note->curriculum_ids, true)) }}</span>
                        @endif
                        <span class="resource-type">Notes & Questions</span>
                    </a>
                </div>
            @empty
                <p class="no-data">No topic notes available.</p>
            @endforelse
        </div>
    </div>
</div>

<style>
    .resources-container {
        padding: 30px;
        max-width: 1200px;
        margin: 0 auto;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .resources-title {
        color: #03a9fc;
        font-size: 2.5em;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .resource-section {
        margin-bottom: 40px;
    }

    .section-title {
        color: #0288d1;
        font-size: 1.8em;
        font-weight: 600;
        margin-bottom: 15px;
        padding-left: 10px;
        border-left: 4px solid #03a9fc;
    }

    .resource-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .resource-card {
        background: #f9f9f9;
        border-radius: 10px;
        padding: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .resource-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(3, 169, 252, 0.3);
    }

    .resource-link {
        text-decoration: none;
        color: #333;
        display: block;
    }

    .resource-title {
        font-size: 1.2em;
        font-weight: 500;
        display: block;
        margin-bottom: 5px;
    }

    .resource-subtitle {
        font-size: 0.9em;
        color: #666;
        display: block;
        margin-bottom: 5px;
    }

    .resource-type {
        font-size: 0.9em;
        color: #555;
        background: #e3f2fd;
        padding: 4px 10px;
        border-radius: 5px;
        display: inline-block;
    }

    .no-data {
        color: #777;
        font-style: italic;
        text-align: center;
        padding: 20px;
    }

    @media (max-width: 768px) {
        .resources-container {
            padding: 20px;
        }

        .resources-title {
            font-size: 2em;
        }

        .section-title {
            font-size: 1.5em;
        }

        .resource-grid {
            grid-template-columns: 1fr;
        }

        .resource-card {
            padding: 10px;
        }
    }

    @media (max-width: 480px) {
        .resources-title {
            font-size: 1.8em;
        }

        .section-title {
            font-size: 1.3em;
        }

        .resource-title {
            font-size: 1.1em;
        }
    }
</style>
@endsection