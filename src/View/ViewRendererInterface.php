<?php
/**
 * Created by Carlos.
 * User: carlosoliveira
 * Date: 22/11/2018
 * Time: 16:04 
 */
declare(strict_types = 1);

namespace SONFin\View;

use Psr\Http\Message\ResponseInterface;

interface ViewRenderInterface 
{
    /**
     * Função: render 
     *
     * @param  mixed $template
     * @param  mixed $context
     *
     * @return ResponseInterface
     */
    public function render(string $template, array $context = []): ResponseInterface;
}