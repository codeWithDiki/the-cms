@props([
    "title",
    "description",
    "keywords",
    "thumbnail_url"
])


<meta name="description" content="{{ $description }}">

<!-- Mencegah duplikasi konten dengan menentukan URL utama halaman ini -->
<link rel="canonical" href="{{ config("app.url") }}">

<!-- Mengatur instruksi untuk robot Google (index = daftarkan, follow = ikuti link) -->
<meta name="robots" content="index, follow">

<!-- ================================================================= -->
<!-- 2. OPEN GRAPH (OG) TAGS - UNTUK SOSIAL MEDIA                      -->
<!-- ================================================================= -->
<!-- Judul saat link dibagikan di WhatsApp/Facebook/LinkedIn -->
<meta property="og:title" content="{{ $title }}">

<!-- Deskripsi singkat saat link dibagikan -->
<meta property="og:description" content="{{ $description }}">

<!-- Link gambar thumbnail/banner preview (Rekomendasi ukuran: 1200 x 630 pixel) -->
<meta property="og:image" content="{{ $thumbnail_url }}">

<!-- URL absolut halaman yang dibagikan -->
<meta property="og:url" content="{{ config("app.url") }}">

<!-- Jenis konten (Gunakan 'website' untuk beranda, atau 'article' untuk blog/berita) -->
<meta property="og:type" content="website">

<!-- ================================================================= -->
<!-- 3. X / TWITTER CARDS (OPSIONAL NAMUN DIREKOMENDASIKAN)            -->
<!-- ================================================================= -->
<!-- Format tampilan card di platform X (summary_large_image adalah yang terbaik) -->
<meta name="twitter:card" content="{{ $thumbnail_url }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ config("app.url") }}">