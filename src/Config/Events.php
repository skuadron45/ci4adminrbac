<?php

namespace Ci4adminrbac\Config;

use CodeIgniter\Events\Events;

Events::on('pre_system', function () {
    Services::encrypter(new Encryption(), true);
    Services::validation(new Validation(), true);
}, Events::PRIORITY_LOW);
