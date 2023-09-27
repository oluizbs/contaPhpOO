<?php
    declare(strict_types=1);
    require_once('Cliente.php');
    class Conta{
        // atributos
        private int $numero;
        private Cliente $titular;
        private float $saldo;
        private static int $totalDeContas=0;
        
        // metodos
        public function __construct(int $numero, Cliente $titular){
            $this->setNumero($numero);
            $this->titular = $titular;
            $this->saldo=0;
            Conta::$totalDeContas++;
        }
        public function __destruc(){
            echo "Destruindo uma conta que estava em memoria...<br>";
            self::$totalDeContas--;
        }
        //Métodos de acesso
        public static function getTotalDeContas(){
            return Conta::$totalDeContas;
        }
        
        public function getSaldo():float{
            return $this->saldo;
        }
        
        public function getNumero():float{
            return $this->numero;
        }
        public function getTitular():Cliente{
            return $this->titular;
        }

        public function setNumero(int $numero):void{
            if($numero<=0)
                die("Numero invalido. Aplicacao encerrada");
            $this->numero = $numero;
        }
        
        public function saca(float $valor):bool{
            if($valor<=0)
                return false;

            $this->saldo-=$valor;
            return true;
        }
        
        public function deposita(float $valor):bool{
            if($valor<=0)
                return false; 
                
            $this->saldo+=$valor;
            return true;
        }
        
        public function transferePara(Conta $contaDestino, float $valor):bool{
            if($this->saca($valor)==true)
                return $contaDestino->deposita($valor);
            else
                return false;
        }
        public function mostraDados():void{
            echo "A conta {$this->getNumero()} de {$this->getTitular()->getNome()} possui saldo de R\${$this->getSaldo()}<br>";
        }
    }
?>

<!-- 12 - Porque invocamos métodos set em vez de simplesmente fazer atribuições?  -->