<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>

    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-[100vh]">
    <header class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-6">
                <p class="text-white text-xl">Todoアプリ</p>
            </div>
        </div>
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-100 dark:text-gray-500 underline">
                    ダッシュボード
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-100 dark:text-gray-500 underline">
                    ログイン
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-100 dark:text-gray-500 underline">
                        ユーザー登録
                    </a>
                @endif
            @endauth
        </div>
        @endif
    </header>

    <main class="grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-[100px]">
                @if(session('loggedIn'))
                <p class="text-2xl font-bold text-center">今日は何する？</p>
                <form action="/tasks" method="post" class="mt-10">
                @csrf
                <input type="hidden" name="userId" value="1">

                <div class="flex flex-col items-center">
                    <label class="w-full max-w-3xl mx-auto">
                        <input
                            class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                            placeholder="文字を入力して下さい"
                            type="text"
                            name="taskName"/>
                    </label>

                    <button
                    type="submit"
                    class="mt-8 p-4 bg-slate-800 text-white w-full max-w-xs hover:bg-slate-900 transition-colors rounded-lg"
                    >
                        追加する
                    </button>
                </div>
                @endif
                </form>

                    <div class="max-w-7xl mx-auto mt-20">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                @if($tasks->isEmpty())
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-sm font-semibold flex justify-center text-gray-900">
                                                タスク
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white flex justify-center">
                                        <tr>
                                            <td class="px-3 py-4 text-sm text-gray-500">
                                                タスクが未登録です
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @else
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th  colspan="2" scope="col" class="py-3.5 pl-4 pr-3 text-sm font-semibold text-gray-900">
                                                タスク
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($tasks as $task)
                                            <tr>
                                            <td class="w-full px-3 py-4 text-sm text-gray-500">
                                                    <div class="flex justify-center">
                                                        {{ $task->name }}
                                                    </div>
                                                </td>
                                                @if(session('loggedIn'))
                                                <td class="p-0 text-right text-sm font-medium ">
                                                    <div class="flex">
                                                        <div>
                                                            <form action="/tasks/{{ $task->id }}"
                                                                method="post"
                                                                class="inline-block text-gray-500 font-medium"
                                                                role="menuitem" tabindex="-1">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="{{$task->status}}">

                                                                <button type="submit"
                                                                    class="bg-emerald-700 py-4 w-20 text-white md:hover:bg-emerald-800 transition-colors"
                                                                    >
                                                                    完了
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div>
                                                            <a href="/tasks/{{ $task->id }}/edit/"
                                                                class="inline-block text-center py-4 w-20 underline underline-offset-2 text-sky-600 md:hover:bg-sky-100 transition-colors"
                                                                >
                                                                編集
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <form onsubmit="return deleteTask();"
                                                                action="/tasks/{{ $task->id }}" method="post"
                                                                class="inline-block text-gray-500 font-medium"
                                                                role="menuitem" tabindex="-1">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="bg-red-700 py-4 w-20 text-white md:hover:bg-red-800 transition-colors"
                                                                    >
                                                                    削除
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </main>
    <footer class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="py-4 text-center">
            <p class="text-white text-sm">Todoアプリ</p>
        </div>
    </div>
    </footer>
</body>

<script>
    function deleteTask() {
        (confirm('本当に削除しますか？')) ? true : false ;
        return
    }
</script>
</html>
