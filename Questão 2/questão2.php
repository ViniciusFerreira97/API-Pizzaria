<?php

class usuario{
    private $cpf;
    protected $nome;
    protected $nascimento;
}
class automovel {
    protected $placa;
    protected $chassi;
    protected $ano;
    protected $marca;
    protected $modelo;
}

class cliente extends usuario{
    protected $endereco;
    protected $veiculos;
}

class atendentes extends usuario{
    protected $matricula;
}
class recibo{
    
}

?>