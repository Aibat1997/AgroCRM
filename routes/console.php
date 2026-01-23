<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:get-fresh-currency')->everyFourHours();
