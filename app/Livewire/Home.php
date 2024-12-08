<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Home extends Component
{
    public $cnpj = '';
    public $dados;
    public $erro;
    public $carregando = false;

    public function consultarCnpj()
    {
        $this->carregando = true;
        $this->erro = null;
        $this->dados = null;

        $response = Http::get("https://minhareceita.org/{$this->cnpj}");

        if ($response->successful()) {
            $this->dados = $response->json();
        } else {
            $this->erro = 'CNPJ não encontrado ou erro na consulta.';
        }

        $this->carregando = false;
    }

    public function render()
    {
        return view('livewire.home');
    }
}
