    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200 text-center">
                            Novo Usuário
                        </h2>
                    </div>
                    <form action="{{ route('users.store') }}" method="POST">
                        @include('admin.users.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
