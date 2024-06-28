    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-6">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-500">Usuário  {{ $user->name }}</h2>
                    </div>



                    <ul class="max-w-md space-y-1 text-gray-500 list-inside list-none">
                        <li><strong>Nome: </strong>{{ $user->name }}</li>
                        <li><strong>Email: </strong>{{ $user->email }}</li>
                    </ul>

                    <x-alert/>

                    {{-- @can('is-owner', $user)
                        Pode deletar
                    @endcan --}}

                    @can('is-admin')
                        <form action="{{ route('users.destroy', $user->id )}}" method="post">
                            @csrf
                            @method('delete')

                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancelar') }}
                            </x-secondary-button>

                            <x-danger-button  x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="mt-5 ml-4">
                                {{ __('Deletar') }}
                            </x-danger-button>

                        </form>

                        <!-- Modal Deleção-->
                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('users.destroy', $user->id) }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 flex justify-center mt-10">
                                    {{ __('Tem certeza de que deseja excluir sua conta?') }}
                                </h2>

                                <p class="mt-5 text-sm text-gray-600 dark:text-gray-400 text-center ">
                                    {{ __('Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Clique em confirmar para excluir permanentemente essa conta.') }}
                                </p>

                                <div class="mt-6 flex justify-center mb-10">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancelar') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ms-3">
                                        {{ __('Deletar Conta') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    @endcan
                </div>
            </div>
         </div>
    </div>
