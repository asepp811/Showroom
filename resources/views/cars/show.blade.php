<!DOCTYPE html>
<html>
<head>
    <title>Detail Showroom Mobil</title>
    <style>
        :root {
            color: #e2e8f0;
            background: #020617;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: radial-gradient(circle at top left, rgba(56, 189, 248, 0.16), transparent 22%),
                        linear-gradient(180deg, #04091a 0%, #060e20 100%);
        }

        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        .detail-panel {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: minmax(0, 1.2fr) minmax(320px, 0.8fr);
        }

        .card {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(148, 163, 184, 0.18);
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(3, 12, 33, 0.5);
        }

        .hero {
            padding: 2rem;
        }

        .title {
            margin: 0;
            font-size: clamp(2.5rem, 4vw, 3.6rem);
            line-height: 1.02;
            color: #f8fafc;
            letter-spacing: -0.04em;
        }

        .subtitle {
            margin: 1rem 0 0;
            color: #94a3b8;
            font-size: 1rem;
            line-height: 1.8;
            max-width: 38rem;
        }

        .image-block {
            position: relative;
            min-height: 420px;
            background: radial-gradient(circle at center, rgba(56, 189, 248, 0.18), transparent 45%);
            display: grid;
            place-items: center;
        }

        .image-block img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .details {
            padding: 2rem;
            display: grid;
            gap: 1rem;
        }

        .detail-note {
            color: #94a3b8;
            font-size: 0.95rem;
        }

        .detail-row {
            display: grid;
            gap: 0.75rem;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .detail-item {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(148, 163, 184, 0.12);
            border-radius: 22px;
            padding: 1.25rem 1.4rem;
        }

        .detail-item strong {
            display: block;
            color: #cbd5e1;
            font-size: 0.85rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 0.45rem;
        }

        .detail-item span {
            color: #f8fafc;
            font-size: 1rem;
            line-height: 1.6;
        }

        .price-tag {
            font-size: 2rem;
            font-weight: 800;
            color: #38bdf8;
        }

        .footer {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-top: 1rem;
        }

        .btn,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 0.95rem 1.6rem;
            font-weight: 700;
            border: none;
            text-decoration: none;
            transition: transform 0.2s ease, background 0.2s ease;
            cursor: pointer;
        }

        .btn {
            background: #38bdf8;
            color: #020617;
        }

        .btn-secondary {
            background: rgba(255,255,255,0.08);
            color: #cbd5e1;
            border: 1px solid rgba(148, 163, 184, 0.18);
        }

        .btn:hover,
        .btn-secondary:hover {
            transform: translateY(-2px);
        }

        .no-image {
            color: #94a3b8;
            font-size: 1rem;
            text-align: center;
            padding: 1.5rem;
        }

        @media (max-width: 900px) {
            .detail-panel {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .page {
                padding: 1rem 0 2rem;
            }

            .hero {
                padding: 1.5rem;
            }

            .detail-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <div class="detail-panel">
        <section class="card image-block">
            @if($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}">
            @else
                <span class="no-image">Gambar belum tersedia</span>
            @endif
        </section>

        <section class="card">
            <div class="hero">
                <p class="title">{{ $car->name }}</p>
                <p class="subtitle">Model showroom premium dengan gaya elegan dan sentuhan modern. Cocok untuk pengguna yang menginginkan tampilan otomotif eksklusif.</p>
            </div>
            <div class="details">
                <div class="detail-item">
                    <strong>Brand</strong>
                    <span>{{ $car->brand }}</span>
                </div>
                <div class="detail-item">
                    <strong>Warna</strong>
                    <span>{{ $car->color }}</span>
                </div>
                <div class="detail-item">
                    <strong>Harga</strong>
                    <span class="price-tag">€ {{ number_format($car->price, 2, ',', '.') }}</span>
                </div>
                <div class="detail-item detail-row">
                    <div>
                        <strong>Deskripsi</strong>
                        <span>{{ $car->description ?? 'Deskripsi belum tersedia.' }}</span>
                    </div>
                </div>
                <div class="footer">
                    <a class="btn-secondary" href="{{ route('cars.index') }}">Kembali</a>
                    <a class="btn" href="{{ route('cars.edit', $car) }}">Edit Mobil</a>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
