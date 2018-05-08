<?php

namespace App\Services\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class MyCustomPolicy extends Basic
{
    public function configure()
    {
        parent::configure();
        
        $this->addDirective(Directive::STYLE, '*.bootstrapcdn.com self');
        $this->addDirective(Directive::SCRIPT, 'strict-dynamic self');
        $this->addDirective(Directive::IMG, 'self *.tmdb.org');
    }
}
