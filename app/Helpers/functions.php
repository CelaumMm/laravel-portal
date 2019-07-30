<?php

if (!function_exists('parseLocale')) {
    /**
     * Obtem a localização com base na URL
     *
     * @return String localização
     */
    function parseLocale()
    {
        $request = request()->segment(1);

        // Verifica se o $request passado tem '-'
        // Se sim, então muda o idioma Exe: pt-br para pt-BR
        if (($pos = strpos($request, '-')) !== false) {
            $array = explode('-', $request);
            $request = $array[0] . '-' . strtoupper($array[1]);
        }

        // Se não existir idioma na URL, define um padrão
        $locale = config('adminlte.default_locale');

        // Verifica se existe idioma na URL
        // Se sim, altera para o idioma da URL
        if (!empty($request) && in_array(($request), config('adminlte.locales'))) {
            $locale = $request;
        }

        // Seta idioma na aplicação
        App::setLocale($locale);

        // set timezone
        Config::set('app.timezone', config('adminlte.timezone.' . $locale));

        // set language in Carbon
        \Carbon\Carbon::setLocale(str_replace('-', '_', $locale));

        return strtolower($locale);
    }
}

if (!function_exists('formatarDataHora')) {
    /**
     *
     * Retorna data Carbon como string no formato 'd/m/Y'
     *
     * @param $data
     * @return $string
     *
     */
    function formatarDataHora($value, $format = 'd/m/Y')
    {
        return Carbon\Carbon::parse($value)->format($format);
    }
}

if (!function_exists('decamelize')) {
    /**
     * Função para remover o padrao Camel case da string
     *
     * @param String $camelCase string em camel case
     * @return String $separador string para separar
     */
    function decamelize($camelCase, $separador = '-')
    {
        return implode(
            $separador,
        array_map(
                    'strtolower',
                preg_split('/([A-Z]{1}[^A-Z]*)/', $camelCase, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY)
            )
    );
    }
}

if (!function_exists('getDadosVisitante')) {
    /**
     * Obtem informações do visitante como IP, Navegador, Versão do Navegador, Sistema Operacional, Dispositivo, Linguagem
     *
     * @return Array
     */
    // function getDadosVisitante()
    // {
    //     $browser = new Sinergi\BrowserDetector\Browser();
    //     $os = new Sinergi\BrowserDetector\Os();
    //     $device = new Sinergi\BrowserDetector\Device();
    //     $language = new Sinergi\BrowserDetector\Language();

    //     $ip = getIp();

    //     return [
    //         "navegador" => $browser->getName(),
    //         "navegador_versao" => $browser->getVersion(),
    //         "ip" => $ip,
    //         "so" => $os->getName(),
    //         "so_versao" => $os->getVersion(),
    //         "linguagem" => $language->getLanguage(),
    //         "mobile" => $os->isMobile(),
    //         "dispositivo" => $device->getName()
    //     ];
    // }
}

if (!function_exists('getLocalizacao')) {
    /**
     * Obtem a localização pelo IP informado
     *
     * @param type $ip
     * @return type
     */
    function getLocalizacao($ip)
    {
        $localizacao = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));
        return getValue($localizacao);
    }
}

if (!function_exists('getIp')) {
    /**
     * Obtem o número ip do usuário.
     *
     * @return String
     * */
    function getIp()
    {
        return getenv("REMOTE_ADDR");
    }
}

if (!function_exists('getDataBr')) {
    /**
     * Obtem a data atual no formato dd/mm/yyyy.
     *
     * @return String
     * */
    function getDataBr()
    {
        return date("d/m/Y");
    }
}

if (!function_exists('getHora')) {
    /**
     * Obtem a hora atual no formato hh:mm:ss.
     *
     * @return String
     * */
    function getHora()
    {
        return date("H:i:s");
    }
}

if (!function_exists('getDataUsa')) {
    /**
     * Obtem a data atual no formato yyyy-mm-dd.
     *
     * @return String
     * */
    function getDataUsa()
    {
        return date("Y-m-d");
    }
}


if (!function_exists('getDataHoraUsa')) {
    /**
     * Obtem a data e hora atual no formato yyyy-mm-dd hh:mm:ss.
     *
     * @return String
     * */
    function getDataHoraUsa()
    {
        return date("Y-m-d H:i:s");
    }
}

if (!function_exists('getDataHoraBr')) {
    /**
     * Obtem a data e hora atual no formato dd-mm-yyyy hh:mm:ss.
     *
     * @return String
     * */
    function getDataHoraBr()
    {
        return date("d/m/Y H:i:s");
    }
}

if (!function_exists('cpfSemMascara')) {
    /**
     * Tirando a mascara do cpf e completando com zero a esquerda
     *
     * @return String
     * */
    function cpfSemMascara($cpf)
    {
        if (empty($cpf)) {
            return $cpf;
        }

        $novoCpf = str_replace(".", "", $cpf);
        $novoCpf = str_replace("-", "", $novoCpf);
        while (strlen($novoCpf) < 11) {
            $novoCpf = "0" . $novoCpf;
        }

        return $novoCpf;
    }
}

if (!function_exists('cpfComMascara')) {
    /**
     * Colocando a mascara do cpf e completando com zero a esquerda
     *
     * @return String
     * */
    function cpfComMascara($cpf)
    {
        if (empty($cpf)) {
            return $cpf;
        }

        while (strlen($cpf) < 11) {
            $cpf = "0" . $cpf;
        }
        $cpf = substr($cpf, 0, 3) . "." . substr($cpf, 3, 3) . "." . substr($cpf, 6, 3) . "-" . substr($cpf, 9);

        return $cpf;
    }
}

if (!function_exists('validarCpf')) {
    /**
     * Verificar se é um CPF válido
     *
     * @return Boolean
     * */
    // function validarCpf($cpf) {
    //     return Respect\Validation\Validator::cpf()->validate($cpf);
    // }
}


if (!function_exists('telefoneComMascara')) {
    /**
     * Colocando a mascara (00) 0000-0000 no telefone ou (00) 0000-00000 para celular
     *
     * @return String
     * */
    function telefoneComMascara($telefone)
    {
        switch (strlen($telefone)) {
        case 8:
            $a = substr($telefone, 0, 4);
            $b = substr($telefone, 4);

            $telefone = '(11) ' . $a . '-' . $b;

            break;
        case 9:
            $a = substr($telefone, 0, 4);
            $b = substr($telefone, 4);

            $telefone = '(11) ' . $a . '-' . $b;

            break;
        case 0:
            $telefone = '(00) 0000-0000';

            break;
    }

        return $telefone;
    }
}

if (!function_exists('comparaDatas')) {
    /**
     * Comparando as datas Assumido que $dataEntrada e $dataSaida estao em string no formato DD/MM/YYYY.
     *
     * @param String $dataEntrada Espeara a string no formato DD/MM/YYYY.
     * @param String $dataSaida Espeara a string no formato DD/MM/YYYY.
     *
     * @return String
     * */
    function comparaDatas($dataEntrada, $dataSaida)
    {
        if (is_null($dataEntrada) and is_null($dataSaida)) {
            return 'igual';
        }

        $timeZone = new \DateTimeZone('UTC');

        /** Assumido que $dataEntrada e $dataSaida estao em formato dia/mes/ano */
        $data1 = \DateTime::createFromFormat('d/m/Y', $dataEntrada, $timeZone);
        $data2 = \DateTime::createFromFormat('d/m/Y', $dataSaida, $timeZone);

        /** Testa se sao validas */
        if (!($data1 instanceof \DateTime)) {
            return -1;
        }

        if (!($data2 instanceof \DateTime)) {
            return -1;
        }

        if ($data1 > $data2) {
            return 'maior';
        }

        if ($data1 == $data2) {
            return 'igual';
        }

        if ($data1 < $data2) {
            return 'menor';
        }
    }
}

if (!function_exists('stringParaData')) {
    /**
     * Converte uma string em Data assumido que a string esteja no formato DD/MM/YYYY.
     *
     * @param String $string Espera a string no formato DD/MM/YYYY.
     *
     * @return DateTime
     * */
    function stringParaData($string)
    {
        $timeZone = new \DateTimeZone('UTC');

        $data = \DateTime::createFromFormat('d/m/Y', $string, $timeZone);

        return $data;
    }
}

if (!function_exists('stringParaDataHora')) {
    /**
     * Converte uma string em DataTime assumido que a string esteja no formato DD/MM/YYYY 00:00:00.
     *
     * @param String $string Espera a string no formato DD/MM/YYYY 00:00:00.
     *
     * @return DateTime
     * */
    function stringParaDataHora($string)
    {
        $timeZone = new \DateTimeZone('UTC');

        $data = \DateTime::createFromFormat('d/m/Y H:i:s', $string, $timeZone);

        return $data;
    }
}

if (!function_exists('getDriversPDO')) {
    /**
     * Retorno os drivers PDO suportados
     *
     */
    function getDriversPDO()
    {
        return \PDO::getAvailableDrivers();
    }
}

if (!function_exists('criptografar')) {
    /**
     * Função para criptografar crypt AES 256
     *
     * @param data $data Dado a ser criptografado
     * @param string $key Chave para criptografar
     * @return base64 Dado criptografado
     */
    function criptografar($data, $key)
    {
        // Definir um salt aleatório
        $salt = openssl_random_pseudo_bytes(16);

        $salted = '';
        $dx = '';
        // Salt the key(32) and iv(16) = 48
        while (strlen($salted) < 48) {
            $dx = hash('sha256', $dx . $key . $salt, true);
            $salted .= $dx;
        }

        $key = substr($salted, 0, 32);
        $iv = substr($salted, 32, 16);

        $encrypted_data = openssl_encrypt($data, 'AES-256-CBC', $key, true, $iv);
        return base64_encode($salt . $encrypted_data);
    }
}

if (!function_exists('descriptografar')) {
    /**
     * Função para descriptografar decrypt AES 256
     *
     * @param data $edata Dado cryptografado
     * @param string $key Chave para descriptografar
     * @return descriptografado data
     */
    function descriptografar($edata, $key)
    {
        $data = base64_decode($edata);
        $salt = substr($data, 0, 16);
        $ct = substr($data, 16);

        $rounds = 3; // depende do tamanho da chave
        $data00 = $key . $salt;
        $hash = array();
        $hash[0] = hash('sha256', $data00, true);
        $result = $hash[0];
        for ($i = 1; $i < $rounds; $i++) {
            $hash[$i] = hash('sha256', $hash[$i - 1] . $data00, true);
            $result .= $hash[$i];
        }
        $key = substr($result, 0, 32);
        $iv = substr($result, 32, 16);

        return openssl_decrypt($ct, 'AES-256-CBC', $key, true, $iv);
    }
}

if (!function_exists('minuscula')) {
    /**
     *  Converte a string para letras minusculas
     *
     * @param string $string
     * @return string
     */
    function minuscula($string)
    {
        return strtolower($string);
    }
}

if (!function_exists('maiuscula')) {
    /**
     * Converte a string para letras maiusculas
     *
     * @param string $string
     * @return string
     */
    function maiuscula($string)
    {
        return strtoupper($string);
    }
}

if (!function_exists('primeiraLetraMaiuscula')) {
    /**
     * Converte a primeira letra da string para maiuscula
     *
     * @param string $string a ser convertida
     * @return string
     */
    function primeiraLetraMaiuscula($string)
    {
        return ucwords($string);
    }
}

if (!function_exists('getValor')) {
    /**
     * Retorna o valor informado se existir
     *
     * @param string $campo
     * @return string
     */
    function getValor($campo)
    {
        return (isset($campo) && !empty($campo)) ? $campo : null;
    }
}

if (!function_exists('gerarToken')) {
    /**
     * Cria um identificador de 32 caracteres(a 128 bit hex number) que é extremamente dificil de prever.
     *
     * @return string 32 caracteres
     */
    function gerarToken()
    {
        return md5(uniqid(rand(), true));
    }
}

if (!function_exists('validarEmail')) {
    /**
     * Verifica se é um E-mail válido
     *
     * @return boolean
     */
    function validarEmail($email)
    {
        $email = strip_tags(trim($email));

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('array_sort')) {
    /**
     * Função simples para ordenar uma matriz[][] por uma chave específica. Mantém associação de índice.
     *
     * EXEMPLO de COMO USAR O a funcao array_sort()
     * --------------------------------------------
     * $people = array(
    *           12345 => array(
    *           'id' => 12345,
    *           'first_name' => 'Joe',
    *           'surname' => 'Bloggs',
    *           'age' => 23,
    *           'sex' => 'm'
     *      ),
     *      12346 => array(
     *          'id' => 12346,
     *          'first_name' => 'Adam',
     *          'surname' => 'Smith',
     *          'age' => 18,
     *          'sex' => 'm'
     *      ),
     *      12347 => array(
     *          'id' => 12347,
     *          'first_name' => 'Amy',
     *          'surname' => 'Jones',
     *          'age' => 21,
     *          'sex' => 'f'
     *      )
     * );
     *
     * print_r(array_sort($people, 'age', SORT_DESC)); // Sort by oldest first
     * print_r(array_sort($people, 'surname', SORT_ASC)); // Sort by surname
     *
     * @param type $array para Ordenar
     * @param type $field Campo para Ordenar
     * @param type $order SORT_ASC ou SORT_DESC
     * @return type
     */
    function array_sort($array, $field, $order = SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $field) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }
}

if (!function_exists('array_unique_multidimensional')) {
    /**
     * Função que elimina as linhas duplicadas de um array[][] por uma chave específica.
     *
     * @param Array $array
     * @param String $campo
     *
     * @return Array
     */
    function array_unique_multidimensional($array, $campo)
    {
        $tempArr = array_unique(array_column($array, $campo));
        return array_intersect_key($array, $tempArr);
    }
}
