<?php

/* Read Files Class */

class ReadFiles {

    const PATH = "database/";
    const FILE = "contacts.data";

    /**
     * 
     * @return boolean or Array
     */
    public function read() {
        if ((@fopen(self::PATH . self::FILE, 'r') == false)) {
            return false;
        } else {
            $resultLeitura = array();
            $arquivo = fopen(self::PATH . self::FILE, 'r');

            while (!feof($arquivo)) {
                $buffer = fgets($arquivo);
                $resultLeitura[] = unserialize($buffer);
            }
            fclose($arquivo);
            array_pop($resultLeitura);
            return $resultLeitura;
        }
    }

    public function write(Array $arr) {
        $result = $this->read();
        foreach ($arr as $r) {
            if ($result != null) {
                $lastResult = end($result);
                $r->setCodigoPessoa(($lastResult->getCodigoPessoa() + 1));
            }
            file_put_contents(self::PATH . self::FILE, (serialize($r) . "\n"), FILE_APPEND);
        }
    }

}

?>
