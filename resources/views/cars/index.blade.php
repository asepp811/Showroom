<!DOCTYPE html>
<html>
<head>
    <title>Showroom Mobil</title>
    <style>
        :root {
            color: #1f2937;
            background: #0f172a;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: radial-gradient(circle at top, rgba(255, 255, 255, 0.06), transparent 30%),
                        linear-gradient(180deg, #0b1121 0%, #111827 100%);
            color: #e5e7eb;
        }

        .page {
            min-height: 100vh;
            padding: 2rem 1rem 4rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero {
            display: grid;
            gap: 1.5rem;
            align-items: end;
            margin-bottom: 2rem;
            grid-template-columns: 1.1fr 0.9fr;
        }

        .hero-card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(148, 163, 184, 0.18);
            border-radius: 32px;
            padding: 2rem;
            backdrop-filter: blur(14px);
            box-shadow: 0 30px 60px rgba(15, 23, 42, 0.35);
        }

        .hero-card h1 {
            margin: 0;
            font-size: clamp(2.5rem, 4vw, 4rem);
            line-height: 1.02;
            letter-spacing: -0.04em;
            color: #f8fafc;
        }

        .hero-card p {
            margin: 1.5rem 0 0;
            max-width: 560px;
            color: #cbd5e1;
            font-size: 1rem;
            line-height: 1.8;
        }

        .hero-card .hero-actions {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            padding: 0.95rem 1.6rem;
            transition: transform 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }

        .btn {
            background: linear-gradient(135deg, #38bdf8, #0ea5e9);
            color: #0f172a;
            box-shadow: 0 18px 30px rgba(14, 165, 233, 0.25);
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: rgba(255,255,255,0.08);
            color: #e2e8f0;
            border: 1px solid rgba(148, 163, 184, 0.28);
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.13);
        }

        .filter-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1rem;
            align-items: center;
        }

        .filter-pill {
            border-radius: 999px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(148, 163, 184, 0.18);
            color: #cbd5e1;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(148, 163, 184, 0.16);
            border-radius: 28px;
            overflow: hidden;
            min-height: 420px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.2);
            transition: transform 0.25s ease, border-color 0.25s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            border-color: rgba(56, 189, 248, 0.35);
        }

        .card-image {
            position: relative;
            min-height: 220px;
            background: linear-gradient(180deg, rgba(15,23,42,0.06), rgba(15,23,42,0.24));
            display: grid;
            place-items: center;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .card-image::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15,23,42,0) 40%, rgba(15,23,42,0.54) 100%);
        }

        .card-body {
            padding: 1.5rem;
            display: grid;
            gap: 1rem;
            flex: 1;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            border-radius: 999px;
            background: rgba(14, 165, 233, 0.14);
            color: #7dd3fc;
            padding: 0.55rem 0.85rem;
            font-size: 0.82rem;
            width: fit-content;
        }

        .title {
            margin: 0;
            font-size: 1.4rem;
            color: #f8fafc;
            line-height: 1.2;
        }

        .meta {
            display: flex;
            justify-content: space-between;
            gap: 0.75rem;
            flex-wrap: wrap;
            color: #cbd5e1;
            font-size: 0.95rem;
        }

        .description {
            color: #d1d5db;
            font-size: 0.95rem;
            line-height: 1.7;
            min-height: 72px;
        }

        .price {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #ffffff;
        }

        .card-footer {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .card-footer a,
        .card-footer button {
            flex: 1;
            text-align: center;
            border-radius: 999px;
            border: none;
            padding: 0.85rem 1rem;
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.2s ease, background 0.2s ease;
            cursor: pointer;
        }

        .card-footer a {
            background: rgba(255,255,255,0.08);
            color: #e2e8f0;
        }

        .card-footer button {
            background: #38bdf8;
            color: #0f172a;
        }

        .card-footer a:hover,
        .card-footer button:hover {
            transform: translateY(-1px);
        }

        .placeholder {
            height: 220px;
            display: grid;
            place-items: center;
            color: #94a3b8;
            font-size: 0.95rem;
            padding: 1rem;
        }

        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr;
            }

            .hero-card {
                padding: 1.8rem;
            }
        }

        @media (max-width: 640px) {
            body {
                padding: 1rem 0.5rem 3rem;
            }

            .page {
                padding: 0;
            }

            .hero-card {
                border-radius: 24px;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <section class="hero">
        <div class="hero-card">
            @php
                use Illuminate\Support\Str;
            @endphp
            <h1>Showroom Mobil Eksklusif</h1>
            <p>Temukan koleksi mobil yang siap tampil di jalanan. Setiap unit dilengkapi fitur premium dan desain modern untuk pengalaman otomotif layaknya showroom kota besar.</p>
            <div class="hero-actions">
                <a class="btn" href="{{ route('cars.create') }}">Tambah Mobil Baru</a>
                <a class="btn-secondary" href="#showroom">Lihat Koleksi</a>
            </div>
            <div class="filter-bar">
                <span class="filter-pill">Tipe: Sport</span>
                <span class="filter-pill">Segment: Premium</span>
                <span class="filter-pill">Gaya: Luxury</span>
            </div>
        </div>
        <div class="hero-card" style="display: flex; align-items: center; justify-content: center; min-height: 260px;">
            <div style="width:100%; height:100%; background: linear-gradient(135deg, rgba(56,189,248,0.25), rgba(15,23,42,0.45)); border-radius: 24px; display:flex; align-items:center; justify-content:center;">
                <div style="text-align:center; color:#e2e8f0;">
                    <p style="margin:0; font-size:1.05rem; letter-spacing:0.12em; text-transform:uppercase;">Showroom Mobile</p>
                    <p style="margin-top:0.75rem; font-size:0.95rem; color:#cbd5e1;">Tampilan responsif, elegan, dan modern untuk setiap layar.</p>
                </div>
            </div>
        </div>
    </section>

    @if(session('success'))
        <div class="hero-card" style="margin-bottom:1.5rem;">
            <p style="margin:0; color:#d1fae5;">{{ session('success') }}</p>
        </div>
    @endif

    <section id="showroom" class="grid">
        @forelse($cars as $car)
            <article class="card">
                <div class="card-image">
                    @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}">
                    @else
                        <div class="placeholder">Gambar belum tersedia</div>
                    @endif
                </div>
                <div class="card-body">
                    <span class="badge">{{ $car->brand }}</span>
                    <h2 class="title">{{ $car->name }}</h2>
                    <div class="meta">
                        <span>{{ $car->color }}</span>
                        <span>€ {{ number_format($car->price, 2, ',', '.') }}</span>
                    </div>
                    <p class="description">{{ Str::limit($car->description ?? 'Deskripsi belum tersedia', 120) }}</p>
                    <div class="card-footer">
                        <a href="{{ route('cars.show', $car) }}">Lihat Detail</a>
                        <a href="{{ route('cars.edit', $car) }}">Edit</a>
                        <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display:inline; width:100%; margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <div class="hero-card" style="grid-column: 1 / -1; text-align:center;">
                <p style="margin:0; color:#cbd5e1;">Belum ada koleksi mobil. Tambahkan unit pertama Anda.</p>
            </div>
        @endforelse
    </section>
</div>
</body>
</html>