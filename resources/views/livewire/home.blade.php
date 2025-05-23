<div class="max-w-lg mx-auto p-4">
    <div class="space-y-4">
        <div>
            <input class="w-full mt-2 p-3 border border-zinc-300 focus:outline-none rounded-lg" id="cnpj"
                placeholder="00.000.000/0000-00" type="text" wire:model="cnpj" x-mask="99.999.999/9999-99" />
            <button class="mt-2 w-full bg-[#2c3e50] hover:bg-[#34495e] text-white p-3 rounded-lg"
                wire:click="consultarCnpj" ">
                {{ $carregando ? 'Consultando...' : 'Consultar' }}
            </button>
        </div>

               @if ($erro)
                <div class=" text-center text-red-500">
                    <p>{{ $erro }}</p>
                </div>
                @endif

                @if ($dados)
                    @isset($dados['qsa'])
                        @foreach ($dados['qsa'] as $item)
                            <div class="bg-white p-4 border border-zinc-300 rounded-lg">
                                <h3 class="text-xl font-semibold">{{ $item['qualificacao_socio'] }}</h3>
                                <div class="mt-4">
                                    <p class="border-b p-2"><strong>Nome:</strong> {{ $item['nome_socio'] }}</p>
                                    <p class="border-b p-2"><strong>CPF:</strong> {{ $item['cnpj_cpf_do_socio'] }}</p>
                                    <p class="border-b p-2"><strong>Faixa etaria:</strong> {{ $item['faixa_etaria'] }}</p>
                                    <p class="p-2"><strong>Entrada:</strong>
                                        {{ date('d/m/Y', strtotime($item['data_entrada_sociedade'])) }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                    <div class="bg-white p-4 border border-zinc-300 rounded-lg">
                        <h3 class="text-xl font-semibold">Dados do CNPJ</h3>
                        <div class="mt-4">
                            <p class="border-b p-2"><strong>Razão:</strong> {{ $dados['razao_social'] }}</p>
                            <p class="border-b p-2"><strong>Fantasia:</strong> {{ $dados['nome_fantasia'] }}</p>
                            <p class="border-b p-2"><strong>Porte:</strong> {{ $dados['porte'] }}</p>
                            <p class="border-b p-2"><strong>Logradouro:</strong> {{ $dados['logradouro'] }}</p>
                            <p class="border-b p-2"><strong>Bairro:</strong> {{ $dados['bairro'] }}</p>
                            <p class="border-b p-2"><strong>UF:</strong> {{ $dados['uf'] }}</p>
                            <p class="border-b p-2"><strong>CEP:</strong> {{ $dados['cep'] }}</p>
                            <p class="border-b p-2"><strong>Telefone:</strong> {{ $dados['ddd_telefone_1'] }}</p>
                            <p class="border-b p-2"><strong>Data início:</strong>
                                {{ date('d/m/Y', strtotime($dados['data_inicio_atividade'])) }}</p>
                            <p class="border-b p-2"><strong>Situação:</strong>
                                {{ $dados['descricao_situacao_cadastral'] }}</p>
                            <p class="p-2"><strong>Data situação:</strong>
                                {{ date('d/m/Y', strtotime($dados['data_situacao_cadastral'])) }}</p>
                        </div>
                    </div>
                    <div class="bg-white p-4 border border-zinc-300 rounded-lg">
                        <h3 class="text-xl font-semibold">CNAE Principal</h3>
                        <div class="mt-4">
                            <p class="border-b p-2"><strong>Código:</strong> {{ $dados['cnae_fiscal'] }}</p>
                            <p class="p-2"><strong>Descrição:</strong> {{ $dados['cnae_fiscal_descricao'] }}</p>
                        </div>
                    </div>
                    @if (
                        $dados['cnaes_secundarios'] &&
                            isset($dados['cnaes_secundarios'][0]['codigo']) &&
                            $dados['cnaes_secundarios'][0]['codigo'] != 0)
                        <div class="bg-white p-4 border border-zinc-300 rounded-lg">
                            <h3 class="text-xl font-semibold">CNAES Secundário</h3>
                            @foreach ($dados['cnaes_secundarios'] as $item)
                                <div class="mt-4">
                                    <p class="border-b p-2"><strong>Código:</strong> {{ $item['codigo'] }}</p>
                                    <p class="p-2"><strong>Descrição:</strong> {{ $item['descricao'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
        </div>

        <div wire:loading>
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center z-50">
                <div class="animate-spin rounded-full h-32 w-32 border-t-4 border-b-4 border-[#2c3e50]"></div>
            </div>
        </div>
    </div>
