<?xml version = "1.0" encoding = "UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>Daily</changefreq>
        <priority>0.8</priority>
    </url>

    @forelse($rows as $row)
        <url>
            <loc>{{ route('client.slug',$row->seoable->slug ?? '') }}</loc>
            <lastmod>{{ $row->created_at->toAtomString() }}</lastmod>
            <changefreq>Daily</changefreq>
            <priority>0.8</priority>
        </url>
    @empty
    @endforelse
</urlset>