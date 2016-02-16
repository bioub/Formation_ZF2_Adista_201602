<?php

namespace AdstBootstrap\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Alert extends AbstractHelper
{
    public function __invoke($message, $type = 'success')
    {
        if (!in_array($type, ['success', 'info', 'warning', 'danger'])) {
            throw new \Zend\View\Exception\RuntimeException('Invalid bootstrap type alert');
        }
        
        // Syntaxe HEREDOC
        return <<<HTML
<div class="alert alert-$type alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    $message
</div>
HTML;
    }
}
