<?php

namespace nortedevbr\Entities;

use ReflectionClass;

/**
 *
 */
class Endereco
{
    /**
     * @var string
     */
    private string $bairro;
    /**
     * @var string
     */
    private string $cep;
    /**
     * @var string
     */
    private string $cidade;
    /**
     * @var string
     */
    private string $complemento2;
    /**
     * @var string
     */
    private string $end;
    /**
     * @var string
     */
    private string $uf;

    /**
     * @param \stdClass $respostaSoap
     */
    public function __construct(\stdClass $respostaSoap)
    {
        $this->setBairro($respostaSoap->return->bairro);
        $this->setCep($respostaSoap->return->cep);
        $this->setCidade($respostaSoap->return->cidade);
        $this->setComplemento2($respostaSoap->return->complemento2);
        $this->setEndereco($respostaSoap->return->end);
        $this->setUf($respostaSoap->return->uf);
    }

    /**
     * @return string
     */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     * @return Endereco
     */
    public function setBairro(string $bairro): Endereco
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return string
     */
    public function getCep(): string
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     * @return Endereco
     */
    public function setCep(string $cep): Endereco
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return string
     */
    public function getCidade(): string
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     * @return Endereco
     */
    public function setCidade(string $cidade): Endereco
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getComplemento2(): string
    {
        return $this->complemento2;
    }

    /**
     * @param string $complemento2
     * @return Endereco
     */
    public function setComplemento2(string $complemento2): Endereco
    {
        $this->complemento2 = $complemento2;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndereco(): string
    {
        return $this->end;
    }

    /**
     * @param string $end
     * @return Endereco
     */
    public function setEndereco(string $end): Endereco
    {
        $this->end = $end;
        return $this;
    }

    /**
     * @return string
     */
    public function getUf(): string
    {
        return $this->uf;
    }

    /**
     * @param string $uf
     * @return Endereco
     */
    public function setUf(string $uf): Endereco
    {
        $this->uf = $uf;
        return $this;
    }
}