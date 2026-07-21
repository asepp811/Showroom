<!DOCTYPE html>
<html>
<head>
    <title>Edit Mobil</title>
    <style>
        :root {
            color: #2f3438;
            background: #f5f2ed;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            padding: 2rem;
            background: #f5f2ed;
        }

        .page {
            max-width: 760px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 22px 56px rgba(48, 55, 66, 0.12);
            overflow: hidden;
        }

        header {
            padding: 2rem 2.5rem 1.5rem;
            border-bottom: 1px solid #ede7dd;
        }

        h1 {
            margin: 0;
            font-size: 2rem;
            font-family: 'Georgia', serif;
            letter-spacing: -0.03em;
        }

        .content {
            padding: 2rem 2.5rem 2.5rem;
        }

        .form-card {
            display: grid;
            gap: 1.3rem;
        }

        label {
            display: block;
            margin-bottom: 0.55rem;
            font-weight: 600;
            color: #444b54;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #d7d1c7;
            border-radius: 14px;
            padding: 0.95rem 1rem;
            background: #fbfaf8;
            font-size: 1rem;
            color: #2f3438;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .field {
            background: #fbfaf8;
            padding: 1rem;
            border-radius: 22px;
            border: 1px solid #ece5dc;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.35);
        }

        .image-field {
            border: 1px dashed #d7d1c7;
            padding: 1.1rem;
            background: linear-gradient(180deg, rgba(244,241,236,0.9), rgba(255,255,255,0.95));
        }

        .file-input-wrapper {
            position: relative;
            display: inline-flex;
            width: 100%;
            align-items: center;
            justify-content: flex-start;
            gap: 0.9rem;
            padding: 1rem 1.1rem;
            border-radius: 18px;
            border: 1px solid #c7beb3;
            background: #ffffff;
            cursor: pointer;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-wrapper span {
            z-index: 1;
            color: #4b525b;
            font-weight: 600;
        }

        .current-image {
            margin-top: 0.75rem;
            color: #5b6170;
        }

        .actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
            margin-top: 1.25rem;
        }

        .btn,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.95rem 1.4rem;
            border-radius: 9999px;
            text-decoration: none;
            border: none;
            font-weight: 700;
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .btn {
            background: #3d566e;
            color: #ffffff;
        }

        .btn-secondary {
            background: #f4f1ec;
            color: #4b525b;
            border: 1px solid #dad1c7;
        }

        .btn:hover,
        .btn-secondary:hover {
            transform: translateY(-1px);
        }

        .errors {
            margin-bottom: 1.5rem;
            padding: 1rem 1.2rem;
            border-radius: 18px;
            background: #fff1f0;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .errors ul {
            margin: 0;
            padding-left: 1.2rem;
        }
    </style>
</head>
<body>
<div class="page">
    <header>
        <h1>Edit Mobil</h1>
    </header>
    <div class="content">
        @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data" class="form-card">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $car->name) }}" required>
            </div>

            <div class="field">
                <label>Brand</label>
                <input type="text" name="brand" value="{{ old('brand', $car->brand) }}" required>
            </div>

            <div class="field">
                <label>Warna</label>
                <input type="text" name="color" value="{{ old('color', $car->color) }}" required>
            </div>

            <div class="field">
                <label>Harga</label>
                <input type="number" name="price" value="{{ old('price', $car->price) }}" step="0.01" required>
            </div>

            <div class="field image-field">
                <label>Gambar</label>
                <div class="file-input-wrapper">
                    <input type="file" name="image" accept="image/*">
                    <span>Pilih file gambar</span>
                </div>
                @if($car->image)
                    <p class="current-image">Gambar saat ini: {{ basename($car->image) }}</p>
                @endif
                <small>File JPG/PNG maksimal 2MB. Biarkan kosong untuk menjaga gambar lama.</small>
            </div>

            <div class="field">
                <label>Deskripsi</label>
                <textarea name="description">{{ old('description', $car->description) }}</textarea>
            </div>

            <div class="actions">
                <button class="btn" type="submit">Perbarui</button>
                <a class="btn-secondary" href="{{ route('cars.index') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
