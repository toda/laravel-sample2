@props([
    'title' => 'タイトル初期値',
    'content' => 'コンテンツ初期値',
    'message' => 'メッセージ初期値',
])

{{-- <div class="border-2 shadow-md w-1/4 p-2">
    <div>{{ $title }}</div>
    <div>画像</div>
    <div>{{ $content }}</div>
    <div>{{ $message }}</div>
</div> --}}

{{-- <div {{ $attributes }} class="border-2 shadow-md w-1/4 p-2">
    <div>{{ $title }}</div>
    <div>画像</div>
    <div>{{ $content }}</div>
    <div>{{ $message }}</div>
</div> --}}

<div {{ $attributes->merge(['class' => 'border-2 shadow-md w-1/4 p-2']) }}>
    <div>{{ $title }}</div>
    <div>画像</div>
    <div>{{ $content }}</div>
    <div>{{ $message }}</div>
</div>
