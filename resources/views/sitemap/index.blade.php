<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <sitemap>
    <loc>{{$post->url}}</loc>
    <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
  </sitemap>
  <sitemap>
    <loc>{{$page['url']}}</loc>
    <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
  </sitemap>
  <sitemap>
    <loc>{{$category['url']}}</loc>
    <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
  </sitemap>
</sitemapindex>