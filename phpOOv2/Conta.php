<?php

    declare(strict_types=1){
        class Conta{
            // atributos
            private int $numero;
            private string $cpf;
            private string $titular;
            private float $saldo;
            // metodos
            public function __construct(int $numero, string $titular, string $cpf){
                // "__" magia né pae
                $this-> setNumero($numero);
                $this-> setCpf($cpf);
                $this-> setTitular($titular);
                $this-> saldo = 0;
                // echo "Instanciando um objeto da classe em memória...<br>";
            }

            public function getNumero():float{
                return $this->numero;
            }

            public function setNumero(int $numero):void{
                if($numero<=0){
                    die("Numero invalido. Aplicacao encerrada");
                // $this->numero = $numero;
                exit();
                }
                $this->numero = $numero;
            }

            public function getCpf():string{
                return $this->cpf;
            }

            // metodo encapsulado
            private function validaCpf(string $cpf):bool{
                if(strlen($cpf)===14 && strpos($cpf, '.')===3 && strpos($cpf, '.', 4)===7 && strpos($cpf, '-')===11)
                    return true;
                else{
                    echo "CPF inválido. A aplicação será encerrada.";
                    exit();
                }
            }
            
            public function setCpf(string $cpf):void{
                // if(strlen($cpf)!=11)
                //     die("cpf invalido. aplicacao encerrada");
                if($this->validaCpf($cpf)===false){
                    echo("Cpf invalido.");
                    return;
                }
                $this->cpf = $cpf;
            }

            // public function modificaCpf(string $cpf):void{
            //     if($this->validaCpf($cpf)===false)
            //         die("Cpf invalido. aplicacao encerrada");
            // }



            public function getTitular():string{
                return $this->titular;
            }

            public function setTitular(string $titular):void{
                if(strlen($titular)<5)
                    die("titular precisa ter ao menos 5 caracteres. aplicacao encerrada");
                $this->titular = $titular;
            }

            public function getSaldo():float{
                return $this->saldo;
            }

            public function mostraDados():void{
                echo "A conta {$this->getNumero()} de {$this->getTitular()} com cpf {$this->cpf} e tem o saldo de R\${$this->getSaldo()}<br>";
            }

            public function saca(float $valor):bool{
                if($valor<=0 || $valor>$this->saldo){
                    //o this referencia o proprio objeto
                    // echo "Valor R\${$valor} alto demais para saque.<br>";
                    // return; //Early return = tramontina
                    return false;
                }else{
                    $this->saldo-=$valor;
                    return true;
                }
                // $this->saldo -=$valor;
            }

            public function deposita(float $valor):bool{
                if($valor<=0)
                    // echo "Depósito não efetuado. O valor deve ser maior que 0.<br>";
                    // return; //Early return
                        return false; 
                    $this->saldo+=$valor;
                    return true;

                // $this->saldo += $valor;
            }

            public function transferePara(Conta $contaDestino, float $valor):bool{
                // $this->saca($valor);
                // $contaDestino->deposita($valor);
                if($this->saca($valor)===true)
                    return $contaDestino->deposita($valor);
                else
                    return false;
            }
        }
    }
?>

<!-- 12 - Porque invocamos métodos set em vez de simplesmente fazer atribuições?  -->