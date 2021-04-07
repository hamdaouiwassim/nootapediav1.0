<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($pages as $page)
    <url>
      <loc>{{ $page['url'] }}</loc>
      <lastmod>2021-01-19T20:29:02+00:00</lastmod>
      @if ($page['url'] == "https://www.nootapedia.com")
      <changefreq>daily</changefreq>
      @else
      <changefreq>weekly</changefreq>
      @endif
      <priority>1.0</priority>
    </url>
  @endforeach
</urlset>