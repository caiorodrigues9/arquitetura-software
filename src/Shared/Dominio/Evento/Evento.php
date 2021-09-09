<?php

namespace Caio\Arquitetura\Shared\Dominio\Evento;

use JsonSerializable;

interface Evento extends JsonSerializable
{
    public function momento(): \DateTimeImmutable;
}