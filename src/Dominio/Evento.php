<?php

namespace Caio\Arquitetura\Dominio;

interface Evento
{
    public function momento(): \DateTimeImmutable;
}