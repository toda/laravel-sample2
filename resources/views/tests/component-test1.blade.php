<x-tests.app>
    <x-slot name="header">ヘッダー1</x-slot>
    テストコンポーネント1

    <x-card title="タイトル1" content="本文" :message="$message" />
    <x-card title="タイトル2" content="本文" />
    <x-card title="CSS変更3" content="本文" :message="$message" class="bg-red-300" />
</x-tests.app>
