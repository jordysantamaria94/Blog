@if($metas)
<title>{{ $metas['title'] }}</title>
<meta name="title" content="{{ $metas['title'] }}">
<meta name="description" content="{{ $metas['description'] }}">
<meta name="content-language" content="es_MX">
<meta name="robots" content="index, follow">
<meta name="url" content="{{ $metas['url'] }}">
<meta name="author" content="Jordy Santamaria">
<meta name="image" content="{{ $metas['image'] }}">
<meta name="keywords" content="{{ $metas['keywords'] }}">
<meta name="fb:app_id" content="817542738420507">
<meta name="og:type" content="website">
<meta name="og:title" content="{{ $metas['title'] }}">
<meta name="og:url" content="{{ $metas['url'] }}">
<meta name="og:image" content="{{ $metas['image'] }}">
<meta name="og:description" content="{{ $metas['description'] }}">
<meta name="og:image:alt" content="{{ $metas['title'] }}">
<meta name="og:updated_time" content="{{ date('Y-m-d H:i:s') }}">
<meta name="twitter:site" content="@jordysantm">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $metas['url'] }}">
<meta name="twitter:title" content="{{ $metas['title'] }}">
<meta name="twitter:description" content="{{ $metas['description'] }}">
<meta name="twitter:image" content="{{ $metas['image'] }}">
@endif
