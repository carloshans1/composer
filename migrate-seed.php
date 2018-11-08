<?php

exec(__DIR__ . '/vendor/robmorgan/phinx/bin/phinx rollback');

exec(__DIR__ . '/vendor/robmorgan/phinx/bin/phinx migrate');

exec(__DIR__ . '/vendor/robmorgan/phinx/bin/phinx seed:run');

