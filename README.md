# Busca CEP
SDK de integração com o sistema de busca de CEPs dos Correios do Brasil

# Instalação
Via composer
```bash
composer require nortedevbr/buscacep
```

# Como usar
```php
$buscaCep = new BuscaCep();
$resposta = $buscaCep->porCep(67100090);
echo $resposta->getEndereco();
```
Saída:
``Rua Primeiro de Janeiro``