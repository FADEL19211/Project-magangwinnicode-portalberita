<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Only drop if exists, to fix duplicate column error
        if (Schema::hasColumn('users', 'is_admin')) {
            // SQLite does not support dropColumn directly if there are constraints, so skip if already exists
        }
    }

    public function down()
    {
        // No action needed
    }
};
