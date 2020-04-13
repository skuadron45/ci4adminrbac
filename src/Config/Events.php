<?php

namespace Ci4adminrbac\Config;

use CodeIgniter\Events\Events;

Events::on('pre_system', function () {
    Services::filters(new Filters());
    Services::encrypter(new Encryption(), true);
    Services::validation(new Validation(), true);
}, EVENT_PRIORITY_LOW);
