<?php

namespace nortedevbr;

use nortedevbr\Entities\Endereco;
use nortedevbr\Supports\Numerico;
use SoapClient;
use SoapFault;

/**
 * Classe de busca de Ceps e endereços
 *
 * @package nortedevbr
 */
class BuscaCep
{
    /**
     * @var string $endpoint Endereço do WSDL
     */
    private string $endpoint = 'https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl';
    /**
     * @var SoapClient $client Instância da classe SoapClient com as configurações e endereço
     */
    private SoapClient $client;
    /**
     * @var array|null $config Configurações do serviço
     */
    private ?array $config;

    /**
     * @throws SoapFault
     */
    public function __construct()
    {
        $this->setConfig(1, 0, WSDL_CACHE_MEMORY);
        $this->setClient();
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     * @return BuscaCep
     */
    public function setEndpoint(string $endpoint): BuscaCep
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @return SoapClient
     */
    private function getClient(): SoapClient
    {
        return $this->client;
    }

    /**
     * @return void
     * @throws SoapFault
     */
    private function setClient(): void
    {
        $this->client = new SoapClient($this->getEndpoint(), $this->getConfig());
    }

    /**
     * @return array|null
     */
    public function getConfig(): ?array
    {
        return $this->config ?? null;
    }

    /**
     * @param int $trace
     * @param int $exception
     * @param int $cache_wsdl
     * @return BuscaCep
     */
    public function setConfig(int $trace = 1, int $exception = 0, int $cache_wsdl = WSDL_CACHE_MEMORY): BuscaCep
    {
        $this->config = [
            "trace" => $trace,
            "exception" => $exception,
            "cache_wsdl" => $cache_wsdl
        ];
        return $this;
    }

    /**
     * Recupera as informações do CEP informado
     * @param string $cep Cep de consulta, sem caracteres especiais
     * @throws SoapFault
     */
    public function porCep(string $cep): Endereco
    {
        $cep = Numerico::apenasNumeros($cep);
        $resposta = $this->getClient()->consultaCEP(['cep' => $cep]);
        return new Endereco($resposta);
    }
}