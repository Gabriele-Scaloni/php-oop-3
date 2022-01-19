<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-oop-3</title>
</head>
<body>

    <!--            EX 1
        Definire classe User:
    *          ATTRIBUTI (private):
    *          - username 
    *          - password
    *          - age
    *          
    *          METODI:
    *          - costruttore che accetta username, e password
    *          - proprieta' getter/setter
    *          - printMe: che stampa se stesso
    *          - toString: "username: age [password]"
    * 
    *          ECCEZIONI:
    *          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
    *          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
    *          - scatenare eccezione se age non e' un numero
    * 
    *          NOTE:
    *          - per testare il singolo carattere di una stringa
    * 
    *      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
    *      try-catch e eventualmente informare l'utente del problema 

    -->
    <?php

    class User {

        private $username;
        private $password;
        private $age;

        public function __construct($username, $password){
            
            $this->setUsername($username);//potrei mettere anche  $this->username = $username ma é più corretto richiamare il set
            $this->setPassword($password);//potrei mettere anche  $this->password = $password ma é più corretto richiamare il set

        }
        
        public function getUsername() {

            return $this->username;
        }
        public function setUsername($username) {
            if (strlen($username) < 3 || strlen($username) >16) {
                throw new Exception("il tuo username deve avere un numero di caratteri tra un minimo di 3 e un massimo di 16");
            } else {
            $this->username = $username;
            }
        }
        public function getPassword() {
             
            return $this->password;
        }
        //$password deve contenere almeno un carattere speciale
        public function setPassword($password) {
           if (!is_numeric($password))//da mettere con caratteri speciali
                throw new Exception("la password deve contenere almeno un carattere speciale");
            $this->password = $password;
        }
        public function getAge() {

            return $this->age;
        }
        public function setAge($age) {
            //$age deve essere numerico
            if (!is_numeric($age))
            throw new Exception("l'età accetta solo valori numerici");
            $this->age = $age; 
        } 
        
        public function __toString()
        {
            return "nome: " . $this->username 
            . "<br>  password : " . $this->password 
            . "<br> età: " . $this->age;
        }
        
        public function printMe()
        {
            echo $this;
        }
    } 

    try { 
        $user = new User("ciao", "3463");//da mettere con caratteri speciali
        $user->setAge("56");
        $user->printMe();
    } catch (Exception $e) {
        echo $e. "<br>" . $e->getMessage()  . "<br>" ;
    }




    echo "<br><br><br>--------------<br> <h2> ex 2 </h2> <br><br><br>"

     /*   EX 2
     Definire classe Computer:
     *          ATTRIBUTI:
     *          - codice univoco
     *          - modello
     *          - prezzo
     *          - marca
     *          METODI:
     *          - costruttore che accetta codice univoco e prezzo
     *          - proprieta' getter/setter per tutte le variabili d'istanza
     *          - printMe: che stampa se stesso (come quella vista a lezione)
     *          - toString: "marca modello: prezzo [codice univoco]"
     *          ECCEZIONI:
     *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
     *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
     *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
     * 
     *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
     *      il corretto funzionamento dell'algoritmo
     */
    ?>

    <?php
        class Computer {

            private $codiceunivoco;
            private $modello;
            private $prezzo;
            private $marca;

            public function __construct($codiceunivoco, $modello) {
            
                $this->setCodiceUnivoco($codiceunivoco);
                $this->setModello($modello);
            }

            public function getCodiceUnivoco() {
                return $this->codiceunivoco;
            }
            public function setCodiceUnivoco($codiceunivoco) { 
                //se non é numeric ed é inferiore a 6 caratteri
                if (!is_numeric($codiceunivoco) || strlen($codiceunivoco) !=6){
                throw new Exception("il codice univoco deve contenere esattamente 6 caratteri numerici");
                }
                $this->codiceunivoco = $codiceunivoco;
            }
            public function getModello() {
                return $this->modello;
            }
            public function setModello($modello) { 
                if (strlen($modello) < 3 || strlen($modello) > 20) {
                    throw new Exception("il modello deve essere costituito da una stringa tra i 3 e i 20 caratteri");
                }
                $this->modello = $modello;
            }  
            public function getPrezzo() {
                return $this->prezzo;
            }
            public function setPrezzo($prezzo) { 
                if (!is_int($prezzo) || $prezzo < 0 || $prezzo > 2000){
                throw new Exception("il prezzo deve essere un valore intero compreso tra 0 e 2000");
                }
                $this->prezzo = $prezzo;
            }
            public function getMarca() {
                return $this->marca;
            }
            public function setMarca($marca) { 
                if (strlen($marca) < 3 || strlen($marca) > 20) {
                    throw new Exception("la marca deve essere costituita da una stringa tra i 3 e i 20 caratteri");
                }
                $this->marca = $marca;
            }
            
            public function __toString(){
                return "codice univoco: ".$this->codiceunivoco ."<br>"
                ."modello: ". $this->modello. "<br>"
                ."marca: ".$this->marca. "<br>"
                ."prezzo: ". $this->prezzo ;
            }

            public function printMe()
            {
                echo $this;
            }
        }
        try { 
            $product = new Computer(455335, "34ttttttt");
            $product->setPrezzo(444);
            $product->setMarca("asvv");
            $product->printMe();
        } catch (Exception $c) {
            echo $c. "<br>" . $c->getMessage()  . "<br>" ;
        }
        
    ?>    


    


</body>
</html>